<?php

namespace App\Console\Commands;

use App\Product;
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

        if (empty($record['code'])) {
            $this->info("Code not defined in file");
            return;
        }

        $product = Product::where('code', $record['code'])
            ->first();

        if (!$product) {
            $product = new Product();
            $product->uuid = $this->getUUID();
            $product->code = $record['code'];
            $product->name = $record['name'];
            $product->description = $record['description'];
            $product->unit = $record['unit'];
        } else {
            $product->name = $record['name'];
            $product->description = $record['description'];
            $product->unit = $record['unit'];
        }

        $product->save();
    }
}
