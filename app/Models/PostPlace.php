<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostPlace
 *
 * @property int $id
 * @property int $place_id
 * @property int $post_id
 * @property int $city_id
 * @property-read \App\Models\Place|null $place
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace wherePlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace wherePostId($value)
 * @mixin \Eloquent
 */
class PostPlace extends Model
{

    public $timestamps = false;

    public function place()
    {
        return $this->hasOne(Place::class, 'id', 'place_id');
    }
}
