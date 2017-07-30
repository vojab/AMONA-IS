<?php

namespace App\Repositories;

use App\Models\Tax;
use InfyOm\Generator\Common\BaseRepository;

class TaxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'percentage'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tax::class;
    }

    public static function getTaxesForDropDown()
    {
        return Tax::pluck('name', 'id')->toArray();
    }
}
