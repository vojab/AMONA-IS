<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Import
 * @package App\Models
 * @version April 30, 2017, 11:10 pm UTC
 */
class Import extends BaseModel
{
    use SoftDeletes;

    public $table = 'import';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'name',
        'description'
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
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function importItems()
    {
        return $this->hasMany('App\Models\ImportItem');
    }
}
