<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $url
 * @property string $phone
 * @property string|null $about
 * @property int $price
 * @property int $tarif_id
 * @property int $publication_status
 * @property int|null $rost
 * @property int|null $ves
 * @property int|null $breast_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBreastSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublicationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTarifId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereVes($value)
 * @property int|null $age
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAge($value)
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCityId($value)
 * @property-read PostNational|null $national
 * @property-read \App\Models\PostHairColor|null $hair
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostMetro[] $metro
 * @property-read int|null $metro_count
 * @property-read \App\Models\PostRayon|null $rayon
 * @property-read \App\Models\PostIntimHair|null $intimHair
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostTime[] $time
 * @property-read int|null $time_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostPlace[] $place
 * @property-read int|null $place_count
 * @property-read \App\Models\Files|null $avatar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Files[] $gallery
 * @property-read int|null $gallery_count
 * @property string|null $old_url
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereOldUrl($value)
 * @property-read \App\Models\Files|null $video
 */
class Post extends Model
{

    public function gallery()
    {
        return $this->hasMany(Files::class, 'related_id', 'id')
            ->where(['related_class' => self::class, 'type' => Files::GALLERY_PHOTO_TYPE]);
    }
    public function avatar(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Files::class, 'related_id', 'id')
            ->where(['related_class' => self::class, 'type' => Files::MAIN_PHOTO_TYPE]);
    }

    public function video(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Files::class, 'related_id', 'id')
            ->where(['related_class' => self::class, 'type' => Files::VIDEO_TYPE]);
    }

    public function national(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PostNational::class, 'post_nationals_id', 'id')->with('national');
    }

    public function hair(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PostHairColor::class, 'posts_id', 'id')->with('hair');
    }

    public function metro(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostMetro::class, 'posts_id', 'id')->with('metro');
    }

    public function time(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostTime::class, 'posts_id', 'id')->with('time');
    }

    public function place(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostPlace::class, 'post_id', 'id')->with('place');
    }

    public function rayon(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PostRayon::class, 'posts_id', 'id')->with('rayon');
    }

    public function intimHair(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PostIntimHair::class, 'posts_id', 'id')->with('value');
    }

}
