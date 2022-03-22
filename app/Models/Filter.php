<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Filter
 *
 * @property int $id
 * @property string $filter_url
 * @property string $related_class
 * @property string $related_param
 * @property int $related_id
 * @method static \Illuminate\Database\Eloquent\Builder|Filter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Filter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Filter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereFilterUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereRelatedClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereRelatedParam($value)
 * @mixin \Eloquent
 * @property string $search_param
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereSearchParam($value)
 * @property string $parent_class
 * @property int|null $city_id
 * @property-read \App\Models\Metro|null $metro
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereParentClass($value)
 * @property-read \App\Models\Rayon|null $rayon
 */
class Filter extends Model
{
    public function rayon()
    {
        return $this->hasOne(Rayon::class, 'id', 'related_id');
    }
    public function metro()
    {
        return $this->hasOne(Metro::class, 'id', 'related_id');
    }
}
