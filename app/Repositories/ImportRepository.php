<?php

namespace App\Repositories;

use App\Models\Import;
use InfyOm\Generator\Common\BaseRepository;

class ImportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Import::class;
    }
}
