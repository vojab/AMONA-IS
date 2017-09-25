<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 * @version May 5, 2017, 10:47 pm UTC
 */
class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customer';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'name' => 'string',
        'oib' => 'string',
        'address' => 'string',
        'city' => 'string',
        'post_code' => 'string',
        'state' => 'string',
        'country' => 'string',
        'phone_number_1' => 'string',
        'phone_number_2' => 'string',
        'fax' => 'string',
        'email_1' => 'string',
        'email_2' => 'string',
        'web_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'name' => 'required|string|max:64',
        'oib' => 'string|min:11|max:13',
        'address' => 'string|max:256|nullable',
        'city' => 'string|max:256|nullable',
        'post_code' => 'string|max:16|nullable',
        'state' => 'string|max:256|nullable',
        'country' => 'string|max:256|nullable',
        'phone_number_1' => 'string|max:256|nullable',
        'phone_number_2' => 'string|max:256|nullable',
        'fax' => 'string|max:256|nullable',
        'email1' => 'email|max:128',
        'email2' => 'email|max:128',
        'web_address' => 'string|max:128|nullable',
    ];

    
}
