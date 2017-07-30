<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invoice
 * @package App\Models
 * @version July 29, 2017, 10:11 pm UTC
 */
class Invoice extends Model
{
    use SoftDeletes;

    public $table = 'invoice';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'name',
        'description',
        'customer_id',
        'tax_id',
        'discount'
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
        'description' => 'string',
        'customer_id' => 'integer',
        'tax_id' => 'integer',
        'discount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function invoiceItems()
    {
        return $this->hasMany('App\InvoiceItem');
    }
    
}
