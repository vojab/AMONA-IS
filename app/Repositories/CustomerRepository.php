<?php

namespace App\Repositories;

use App\Models\Customer;
use InfyOm\Generator\Common\BaseRepository;

class CustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'oib',
        'address',
        'city',
        'post_code',
        'state',
        'country',
        'phone_number_1',
        'phone_number_2',
        'fax',
        'email_1',
        'email_2',
        'web_address'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Customer::class;
    }
}
