<?php

namespace App\Services;

use App\Models\Filter;
use App\Models\Post;

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

    public function makeUrlForPostsTable($value, $city_id)
    {
        $i = 0;

        $value = \Str::slug($value);

        if ($this->findValueInPosts($value, $city_id)){

            $i++;

            a:

            $i++;

            $name = $value . '-' .$i;

            if ($this->findValueInPosts($name, $city_id)) goto a;

            return $name;

        }

        return  $value;
    }


    public function findValue($name): bool
    {

        if (Filter::where(['filter_url' => $name])->first()) return true;

        return false;

    }

    public function findValueInPosts($name, $city_id): bool
    {

        if (Post::where(['url' => $name, 'city_id' => $city_id])->first()) return true;

        return false;

    }

}
