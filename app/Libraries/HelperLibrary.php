<?php

namespace App\Libraries;

class HelperLibrary
{
    public static function generateUUID()
    {
        $val = \DB::select("select uuid() as uuid");
        return $val[0]->uuid;
    }
}
