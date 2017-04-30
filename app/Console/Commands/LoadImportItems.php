<?php

namespace App\Console\Commands;

use App\Import;
use App\ImportItem;
use App\Product;
use Illuminate\Console\Command;

class LoadImportItems extends SpreadsheetLoader
{
    protected $name = 'load:import-items';
    protected $description = 'Loads import items into the database.';

    protected $import;
    protected $firstProcessed = false;

    public function fire()
    {
        $import = new Import();
        $import->uuid = $this->getUUID();
        $import->save();
        $this->import = $import;

        return parent::fire();
    }

    protected function validateData($records)
    {
        return true;
    }

    protected function processRecord($record)
    {
        if (!$this->firstProcessed) {
            $this->firstProcessed = true;
            return;
        }

        if (empty($record['code'])) {
            $this->import->delete();
            $this->info("Code not defined in file");
            return;
        }

        $productCode = $record['code'];
        $product = Product::where('code', $productCode)->first();
        if (!isset($product->id)) {
            $this->import->delete();
            $this->info("Product with code $productCode cannot be found");
            return;
        }

        $importItem = new ImportItem();
        $importItem->uuid = $this->getUUID();
        $importItem->import_id = $this->import->id;
        $importItem->product_id = $product->id;
        $importItem->quantity = $record['quantity'];

        $importItem->save();
    }
}
