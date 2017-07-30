<?php

namespace App\Repositories;

use App\Models\Invoice;
use InfyOm\Generator\Common\BaseRepository;

class InvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'description',
        'customer_id',
        'tax_id',
        'discount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Invoice::class;
    }

    public static function getInvoicesForDropDown()
    {
        return Invoice::pluck('name', 'id')->toArray();
    }
}
