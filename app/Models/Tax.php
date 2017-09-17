<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tax
 * @package App\Models
 * @version July 29, 2017, 10:11 pm UTC
 */
class Tax extends Model
{
    use SoftDeletes;

    public $table = 'tax';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'percentage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'percentage' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'description' => 'string|nullable',
        'percentage' => 'digits_between:0,100',
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
