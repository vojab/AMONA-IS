<?php

namespace App\Console\Commands;

use App\Models;
use Illuminate\Console\Command;

class LoadProducts extends SpreadsheetLoader
{
    protected $name = 'load:products';
    protected $description = 'Loads products (create or update) into the database.';

    protected $firstRowProcessed = false;

    public function fire()
    {
        return parent::fire();
    }

    protected function validateData($records)
    {
        return true;
    }

    protected function processRecord($record)
    {
        if (!$this->firstRowProcessed) {
            $this->firstRowProcessed = true;
            return;
        }

        $productCode = $record['code'];
        $productName = $record['name'];
        $productPrice = $record['price'];

        if (empty($productCode)) {
            $this->info("Code not defined in file");
            return;
        }

        $product = Models\Product::where('code', $productCode)
            ->first();

//        if (!$product) {
//            $product = new Product();
//            $product->uuid = $this->getUUID();
//            $product->code = $record['code'];
//            $product->name = $record['name'];
//            $product->description = $record['description'];
//            $product->unit = $record['unit'];
//        } else {
//            $product->name = $record['name'];
//            $product->description = $record['description'];
//            $product->unit = $record['unit'];
//        }

        // Temporary code for loading English names and product prices

        if (!$product) {
            $this->info("There is no product with code #$productCode in database");
        } else {
            $product->name = utf8_encode($productName);
            $product->price = floatval(str_replace(',', '.', $productPrice));
        }

        $product->save();
    }
}
