<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TopList
 *
 * @property int $id
 * @property int $post_id
 * @property int $valid_to
 * @method static \Illuminate\Database\Eloquent\Builder|TopList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopList query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereValidTo($value)
 * @mixin \Eloquent
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereCityId($value)
 */
class TopList extends Model
{
    //
}
