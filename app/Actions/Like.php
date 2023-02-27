<?php

namespace App\Actions;

use Cookie;

class Like
{
    public static function isLike($id): bool
    {
        if ($ids = \Cookie::get('liked')) {

            $data = unserialize($ids);

            if (in_array($id, $data)) {

                return true;

            }

        }

        return false;

    }

    public static function isDislike($id): bool
    {
        if ($ids = \Cookie::get('disliked')) {

            $data = unserialize($ids);

            var_dump($id);

            if (in_array($id, $data)) {

                return true;

            }

        }

        return false;

    }

    public static function add($id, $type)
    {
        $data = array();

        if ($ids = Cookie::get($type)) {

            $data = unserialize($ids);

            if (!in_array($id, $data)) {

                $data[] = $id;

            }

        } else {

            $data[] = $id;

        }

        $data = serialize($data);

        Cookie::queue($type, $data, 3600 * 24 * 31);
    }

    public static function remove($id, $type)
    {
        $data = array();

        if ($ids = Cookie::get($type)) {

            $data = unserialize($ids);

            foreach ($data as $key => $value){

                if ($value == $id) unset($data[$key]);

            }

        }

        $data = serialize($data);

        Cookie::queue($type, $data, 3600 * 24 * 31);
    }

}
