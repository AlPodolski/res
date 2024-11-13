<?php

namespace App\Services\Pay;

interface PaymentInterface {
    public function getPayUrl($orderId, $sum, $city, $currency);

}
