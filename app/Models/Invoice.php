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

    public static function boot()
    {
        parent::boot();

        self::creating(function($invoice){
            $invoice->date = self::convertDateFormat($invoice->date);
        });

        self::updating(function($invoice){
            $invoice->date = self::convertDateFormat($invoice->date);
        });
    }

    public static function convertDateFormat($date, $format = "Y-m-d")
    {
        $newDate = date($format, strtotime($date));
        return $newDate;
    }

    public $fillable = [
        'uuid',
        'name',
        'description',
        'customer_id',
        'tax_id',
        'discount',
        'date'
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
        'discount' => 'float',
        //'date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'name' => 'required|max:32|string',
        'description' => 'string|max:256|nullable',
        'customer_id' => 'integer',
        'tax_id' => 'integer',
        'discount' => 'digits_between:0,100',
        'date' => 'date',
    ];

    public function invoiceItems()
    {
        return $this->hasMany('App\Models\InvoiceItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function tax()
    {
        return $this->belongsTo('App\Models\Tax');
    }
    
}
