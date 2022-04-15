<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string $value2
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereValue2($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Filter|null $filterUrl
 */
class Service extends Model
{
    public function filterUrl(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Filter::class, 'related_id', 'id')
            ->where(['parent_class' => self::class]);
    }
}
