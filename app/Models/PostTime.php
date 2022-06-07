<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostTime
 *
 * @property int $id
 * @property int $param_id
 * @property int $posts_id
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTime whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTime whereParamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTime wherePostsId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Time|null $time
 */
class PostTime extends Model
{

    public $timestamps = false;

    protected $fillable = ['param_id', 'posts_id', 'city_id'];

    public function time(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Time::class, 'id', 'param_id')->with('filterUrl');
    }
}
