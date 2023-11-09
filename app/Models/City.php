<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\City
 *
 * @property int $id
 * @property string $url
 * @property string $city
 * @property string $city2
 * @property string $city3
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCity2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCity3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUrl($value)
 * @mixin \Eloquent
 * @property string|null $x
 * @property string|null $y
 * @method static \Illuminate\Database\Eloquent\Builder|City whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereY($value)
 */
class City extends Model
{
    public $timestamps = false;
}
