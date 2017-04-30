<?php

namespace App\Console\Commands;

use Illuminate\Console\Command,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console\Input\InputArgument,
    Exception;

abstract class SpreadsheetLoader extends Command
{
    const DELIM = "\t";
    
    protected $headers = array();
    
    abstract protected function validateData($records);
    abstract protected function processRecord($record);
    
    public function fire()
    {
        $data = $this->loadData();
        $this->validateData($data);
        
        foreach ($data as $line => &$record) {
            try {
                $record = $this->processRecord($record);
            } catch(Exception $ex) {
                $this->writeSavedRecords($data);
                throw new Exception("Failure at line {$line}: " . $ex->getMessage());
            }
        }
        unset($record);
        
        $this->writeSavedRecords($data);
    }
    
    protected function writeSavedRecords($records)
    {
        $ss = fopen("php://output", 'w');
        fputcsv($ss, $this->headers, self::DELIM);
        foreach ($records as $record) {
            if ($record) {
                fputcsv($ss, $record, self::DELIM);
            }
        }
        fclose($ss);
    }
    
    protected function normalizeData($data)
    {
        $output = array();
        
        if (!$data) {
            return array();
        }
        
        if (!is_array($data)) {
            $data = array($data);
        }
        
        foreach ($data as $row) {
            $row = explode(',', $row);
            $output = array_merge($output, $row);
        }
        
        $output = array_map('trim', $output);
        $output = array_filter($output);
        
        return $output;
    }
    
    protected function loadData()
    {
        $file = $this->argument('file');
        $ss = fopen($file, 'r');
        $headers = array_map('trim', $this->fgetcsv($ss));
        $this->headers = $headers;
        $data = array();
        while (!feof($ss) && $row = $this->fgetcsv($ss)) {
            $rowData = array();
            
            foreach ($headers as $index => $header) {
                $value = isset($row[$index]) ? trim($row[$index]) : "";
                
                if (isset($rowData[$header]) && !is_array($rowData[$header])) {
                    $rowData[$header] = array($rowData[$header]);
                }
                
                if (!isset($rowData[$header])) {
                    $rowData[$header] = $value;
                } else {
                    $rowData[$header][] = $value;
                    $rowData[$header] = array_filter($rowData[$header]);
                }
            }
            
            $data[] = $rowData;
        }
        fclose($ss);
        return $data;
    }
    
    protected function getUUID()
    {
        $val = \DB::select("select uuid() as uuid");
        return $val[0]->uuid;
    }
    
    protected function fgetcsv($ss)
    {
        return fgetcsv($ss, 4096, $this::DELIM);
    }
    
    protected function getArguments()
    {
        return array(
            array('file', InputArgument::REQUIRED, null, null)
        );
    }
}
