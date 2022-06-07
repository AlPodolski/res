<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostMetro
 *
 * @property int $id
 * @property int $metros_id
 * @property int $posts_id
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro whereMetrosId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro wherePostsId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Metro|null $metro
 */
class PostMetro extends Model
{

    protected $fillable = ['metros_id', 'posts_id', 'city_id'];

    public $timestamps = false;

    public function metro(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Metro::class, 'id', 'metros_id')->with('filterUrl');
    }
}
