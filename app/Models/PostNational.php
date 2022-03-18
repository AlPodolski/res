<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Mpdels\PostNational
 *
 * @property int $id
 * @property int $post_nationals_id
 * @property int $nationals_id
 * @property int $citys_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational whereCitysId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational whereNationalsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational wherePostNationalsId($value)
 * @mixin \Eloquent
 * @property-read National|null $national
 */
class PostNational extends Model
{
    public function national(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(National::class, 'id', 'post_nationals_id');
    }
}
