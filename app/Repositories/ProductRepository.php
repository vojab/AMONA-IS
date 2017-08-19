<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'code',
        'name',
        'description',
        'unit'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    public static function getProducts()
    {
        return Product::all();
    }

    public static function getProductsForDropDown()
    {
        $products = Product::all();
        $productsArrayForDropDown = array();

        foreach ($products as $product) {
            $productsArrayForDropDown[$product->id] = $product->code . ' | ' . $product->name;
        }

        return $productsArrayForDropDown;
    }
}
