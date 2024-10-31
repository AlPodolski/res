<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayCashDay extends Model
{
    public static function add($sum)
    {
        $date = date("Y-m-d");

        if ($cash = self::where('date', $date)->first()) {

            $cash->sum = $cash->sum + $sum;

            $cash->save();

        } else {

            $cash = new PayCashDay();

            $cash->date = $date;
            $cash->sum = $sum;
            $cash->save();

        }
    }
}
