<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Metro
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string|null $value2
 * @property float|null $x
 * @property float|null $y
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereValue2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereY($value)
 * @mixin \Eloquent
 */
class Metro extends Model
{
    //
}
