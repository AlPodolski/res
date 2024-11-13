<?php

namespace App\Services\Pay;

use App\Models\Curency;
use Exception;

class PaymentFactory
{
    /**
     * @throws Exception
     */
    public static function create($paymentType) {
        switch($paymentType) {
            case Curency::OBMENKA_PAY_SYSTEM:
                return new Obmenka();
                break;
            case Curency::BETA_PAY_SYSTEM:
                return new BetaPay();
                break;
            default:
                throw new Exception("Invalid payment type");
        }
    }
}
