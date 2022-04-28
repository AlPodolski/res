<?php

namespace App\Services;

class FilterDataHelper
{
    public static function checkData($data)
    {
        foreach ($data as $item){

            if (!$item) return false;

        }

        return $data;
    }
}
