<?php

namespace App\Models;

use App\Repositories\ImportItemRepository;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ImportItem
 * @package App\Models
 * @version April 30, 2017, 11:06 pm UTC
 */
class ImportItem extends BaseModel
{
    use SoftDeletes;

    public $table = 'import_item';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'order',
        'import_id',
        'product_id',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'order' => 'integer',
        'import_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'import_id' => 'required|integer',
        'product_id' => 'required|integer',
        'quantity' => 'required|numeric|min:1',
        'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
    ];

    public function import()
    {
        return $this->belongsTo('App\Models\Import');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function setOrderNumber()
    {
        $orderNumber = ImportItemRepository::getNextOrderNumber($this->import_id);
        $this->order = $orderNumber;
        $this->update();
    }
}
