<?php

namespace App\Repositories;

use App\Models\InvoiceItem;
use InfyOm\Generator\Common\BaseRepository;

class InvoiceItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'invoice_id',
        'product_id',
        'quantity',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InvoiceItem::class;
    }

    public static function getInvoiceItems()
    {
        return InvoiceItem::all();
    }

    public static function getInvoiceItemQuantity($productId)
    {
        return InvoiceItem::where('product_id', $productId)->sum('quantity');
    }
}
