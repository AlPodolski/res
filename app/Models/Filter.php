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
 * @property-read \App\Models\HairColor|null $hairColor
 * @property-read \App\Models\IntimHair|null $intimHair
 * @property-read \App\Models\National|null $national
 * @property-read \App\Models\Place|null $place
 * @property-read \App\Models\Time|null $time
 * @property string|null $type
 * @property-read \App\Models\Age|null $age
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereType($value)
 * @property-read \App\Models\Price|null $price
 * @property string|null $short_name
 * @method static \Illuminate\Database\Eloquent\Builder|Filter whereShortName($value)
 */
class Filter extends Model
{

    public function age(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Age::class, 'id', 'related_id');
    }

    public function price(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Price::class, 'id', 'related_id');
    }

    public function time(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Time::class, 'id', 'related_id');
    }

    public function place(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Place::class, 'id', 'related_id');
    }

    public function national(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(National::class, 'id', 'related_id');
    }

    public function service(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Service::class, 'id', 'related_id');
    }

    public function hairColor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(HairColor::class, 'id', 'related_id');
    }

    public function intimHair(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(IntimHair::class, 'id', 'related_id');
    }

    public function rayon(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Rayon::class, 'id', 'related_id');
    }
    public function metro(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Metro::class, 'id', 'related_id');
    }
}
