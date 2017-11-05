<?php

namespace App\Providers;

use App\Repositories\ImportItemRepository;
use App\Repositories\InvoiceItemRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('invoice_item_quantity', function ($attribute, $value, $parameters, $validator) {

            $data = $validator->getData();
            $productId = $data['product_id'];

            $productImportItemQuantity = ImportItemRepository::getImportItemQuantity($productId);
            $productInvoiceItemQuantity = InvoiceItemRepository::getInvoiceItemQuantity($productId);
            $totalQuantity = $productImportItemQuantity - $productInvoiceItemQuantity;

            return $totalQuantity >= $value;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
