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
        'order',
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

    public static function getNextOrderNumber($importId)
    {
        $orderNumber = ImportItem::where('import_id', $importId)->max('order');
        return ++$orderNumber;
    }

    public static function reOrder($importId)
    {
        $importItems = ImportItem::where('import_id', $importId)->get();
        foreach ($importItems as $key => $importItem) {

            $importItem->order = ++$key;
            $importItem->update();
        }
    }
}
