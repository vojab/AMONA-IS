<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InvoiceItem
 * @package App\Models
 * @version July 30, 2017, 6:49 pm UTC
 */
class InvoiceItem extends Model
{
    use SoftDeletes;

    public $table = 'invoice_item';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'invoice_id',
        'product_id',
        'quantity',
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
        'invoice_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
    
}
