<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Time
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Time newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Time newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Time query()
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereValue($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Filter|null $filterUrl
 */
class Time extends Model
{
    public function filterUrl(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Filter::class, 'related_id', 'id')
            ->where(['parent_class' => self::class]);
    }
}
