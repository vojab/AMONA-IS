<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version April 30, 2017, 10:18 pm UTC
 */
class Product extends BaseModel
{
    use SoftDeletes;

    public $table = 'product';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'code',
        'name',
        'description',
        'unit',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'unit' => 'string',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'code' => 'required|alpha_dash|max:24',
        'name' => 'required|string|max:255',
        'description' => 'string||max:255|nullable',
        'unit' => 'string',
        'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
    ];

    public function importItem()
    {
        return $this->belongsTo('App\Models\ImportItem');
    }

}
