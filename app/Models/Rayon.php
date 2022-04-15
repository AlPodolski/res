<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rayon
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string|null $value2
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereValue2($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Filter|null $filterUrl
 */
class Rayon extends Model
{
    public function filterUrl(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Filter::class, 'related_id', 'id')
            ->where(['parent_class' => self::class]);
    }
}
