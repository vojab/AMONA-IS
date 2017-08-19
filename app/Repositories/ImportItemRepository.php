<?php

namespace App\Repositories;

use App\Models\ImportItem;
use InfyOm\Generator\Common\BaseRepository;

class ImportItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'import_id',
        'product_id',
        'quantity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ImportItem::class;
    }

    public static function getImportItems()
    {
        return ImportItem::all();
    }

    public static function getImportItemQuantity($productId)
    {
        return ImportItem::where('product_id', $productId)->sum('quantity');
    }
}
