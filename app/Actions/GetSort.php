<?php

namespace App\Actions;

class GetSort
{
    private $default = 'fake DESC, tarif_id DESC, sorting DESC';
    private $priceDesc = 'price DESC';
    private $priceAsc = 'price ASC';

    public function get($sort): string
    {
        switch ($sort) {

            case 'default':
                return $this->default;

            case 'price_asc':
                return $this->priceAsc;

            case 'price_desc':
                return $this->priceDesc;

        }

        return $this->default;

    }
}
