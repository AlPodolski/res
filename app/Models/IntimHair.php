<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IntimHair
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string|null $value2
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair query()
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereValue2($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Filter|null $filterUrl
 */
class IntimHair extends Model
{
    public $timestamps = false;

    public function filterUrl(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Filter::class, 'related_id', 'id')
            ->where(['parent_class' => self::class]);
    }
}
