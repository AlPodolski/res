<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\National
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string $value2
 * @method static \Illuminate\Database\Eloquent\Builder|National newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|National newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|National query()
 * @method static \Illuminate\Database\Eloquent\Builder|National whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|National whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|National whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|National whereValue2($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Filter|null $filterUrl
 */
class National extends Model
{
    public function filterUrl()
    {
        return $this->hasOne(Filter::class, 'related_id', 'id')
            ->where(['parent_class' => self::class]);
    }
}
