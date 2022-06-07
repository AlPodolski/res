<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostIntimHair
 *
 * @property int $id
 * @property int $posts_id
 * @property int $intim_hair_id
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair whereIntimHairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair wherePostsId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\IntimHair|null $value
 */
class PostIntimHair extends Model
{

    protected $fillable = ['posts_id', 'intim_hair_id', 'city_id'];

    public $timestamps = false;

    public function value(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(IntimHair::class, 'id', 'intim_hair_id')->with('filterUrl');
    }
}
