<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HairColor
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor whereValue($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Filter|null $filterUrl
 */
class HairColor extends Model
{
    public $timestamps = true;

    public function filterUrl()
    {
        return $this->hasOne(Filter::class, 'related_id', 'id')
            ->where(['parent_class' => self::class]);
    }
}
