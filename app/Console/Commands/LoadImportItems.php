<?php

namespace App\Console\Commands;

use App\Models\Import;
use App\Models\ImportItem;
use App\Models\Product;
use App\Repositories\ImportItemRepository;
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
        $import->name = $this->argument('name');
        $import->description = "";
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
        $productName = $record['name'];
        $product = Product::where('code', $productCode)->first();
        if (!isset($product->id)) {

            $this->info("Product with code #$productCode and name #$productName does not exists in system");
            if ($this->confirm('Do you want to create and add new product ?')) {

                $product = new Product();
                $product->uuid = $this->getUUID();
                $product->code = $productCode;
                $product->name = utf8_encode($productName);
                $product->description = "";
                $product->unit = "kom.";
                $product->save();

            } else {

                $this->import->delete();
                $this->info("Product with code $productCode cannot be found");
                return;
            }
        }

        $importItem = new ImportItem();
        $importItem->uuid = $this->getUUID();
        $importItem->order = ImportItemRepository::getNextOrderNumber($this->import->id);
        $importItem->import_id = $this->import->id;
        $importItem->product_id = $product->id;
        $importItem->quantity = $record['quantity'];
        $importItem->price = floatval(str_replace(',', '.', $record['price']));

        $importItem->save();
    }
}
