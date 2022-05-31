<?php

namespace App\Actions;

use Cookie;

class AddViewToCookie
{
    public function add($id)
    {

        $data = array();

        if ($ids = Cookie::get('post_view')){

            $data = unserialize($ids);

            if (!in_array($id, $data)){

                $data[] = $id;

            }

        }else{

            $data[] = $id;

        }

        $data = serialize($data);

        Cookie::queue('post_view', $data, 3600);
    }
}
