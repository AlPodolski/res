<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostHairColor
 *
 * @property int $id
 * @property int $posts_id
 * @property int $hair_colors_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor whereHairColorsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor wherePostsId($value)
 * @mixin \Eloquent
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor whereCityId($value)
 * @property-read \App\Models\HairColor|null $hair
 */
class PostHairColor extends Model
{

    protected $fillable = ['posts_id', 'hair_colors_id', 'city_id'];

    public $timestamps = false;

    public function hair(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(HairColor::class, 'id', 'hair_colors_id')->with('filterUrl');
    }
}
