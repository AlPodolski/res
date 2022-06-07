<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostService
 *
 * @property int $id
 * @property int $posts_id
 * @property int $service_id
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostService query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostService whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostService wherePostsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostService whereServiceId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Service|null $service
 */
class PostService extends Model
{
    public $timestamps = false;

    protected $fillable = ['posts_id', 'service_id', 'city_id'];

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id')->with('filterUrl');
    }
}
