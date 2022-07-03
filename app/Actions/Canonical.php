<?php

namespace App\Actions;

class Canonical
{
    public function get($path)
    {
        if (strpos($path, '?')) return strstr($path, '?', true);

        return false;
    }
}
