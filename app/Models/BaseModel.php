<?php

namespace App\Models;

use Eloquent as Model;

class BaseModel extends Model
{
    public function generateUUID()
    {
        $val = \DB::select("select uuid() as uuid");
        return $val[0]->uuid;
    }
}
