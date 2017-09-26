<?php

namespace App\Models;

use App\Repositories\ImportItemRepository;
use App\Repositories\InvoiceItemRepository;
use App\Repositories\ProductRepository;
use Eloquent as Model;

/**
 * Class Warehouse
 * @package App\Models
 * @version August 19, 2017, 10:47 pm UTC
 */
class Warehouse extends Model
{
    public $productId;
    public $productCode;
    public $productName;
    public $productImportItemQuantity;
    public $productInvoiceItemQuantity;
    public $totalQuantity;

    public function getWarehouseData()
    {
        $warehouseDataArray = [];

        $products = ProductRepository::getProducts();
//        $importItems = ImportItemRepository::getImportItems();
//        $invoiceItems = InvoiceItemRepository::getInvoiceItems();

        // For each product get total quantity of import items and then get total quantity
        // of invoice items in order to calculate final quantity (import item quantity - invoice item quantity)

        foreach ($products as $product) {

            $warehouseData = new Warehouse();

            $warehouseData->productId = $product->id;
            $warehouseData->productCode = $product->code;
            $warehouseData->productName = $product->name;
            $warehouseData->productPrice = $product->price;

            $warehouseData->productImportItemQuantity = ImportItemRepository::getImportItemQuantity($product->id);
            $warehouseData->productInvoiceItemQuantity = InvoiceItemRepository::getInvoiceItemQuantity($product->id);
            $warehouseData->totalQuantity = $warehouseData->productImportItemQuantity - $warehouseData->productInvoiceItemQuantity;

            array_push($warehouseDataArray, $warehouseData);
        }

//        $warehouseData = [
//            'products' => $products,
//            'importItems' => $importItems,
//            'invoiceItems' => $invoiceItems,
//        ];

        return $warehouseDataArray;
    }
    
}
