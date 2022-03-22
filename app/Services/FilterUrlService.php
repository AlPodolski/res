<?php

namespace App\Services;

use App\Models\Filter;

class FilterUrlService
{
    public function makeUrlForFilterTable($value)
    {
        $i = 0;

        $value = \Str::slug($value);

        if ($this->findValue($value)){

            $i++;

            a:

            $i++;

            $name = $value . '-' .$i;

            if ($this->findValue($name)) goto a;

            return $name;

        }

        return  $value;
    }


    public function findValue($name): bool
    {

        if (Filter::where(['filter_url' => $name])->first()) return true;

        return false;

    }

}
