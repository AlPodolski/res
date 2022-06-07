<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostRayon
 *
 * @property int $id
 * @property int $posts_id
 * @property int $rayons_id
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostRayon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostRayon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostRayon query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostRayon whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostRayon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostRayon wherePostsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostRayon whereRayonsId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Rayon|null $rayon
 */
class PostRayon extends Model
{

    public $timestamps = false;

    protected $fillable = ['posts_id', 'rayons_id', 'city_id'];

    public function rayon(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Rayon::class, 'id', 'rayons_id')->with('filterUrl');
    }
}
