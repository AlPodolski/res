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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Files[] $gallery
 * @property-read int|null $gallery_count
 * @property string|null $old_url
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereOldUrl($value)
 * @property-read \App\Models\Files|null $video
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Files[] $selphi
 * @property-read int|null $selphi_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostService[] $service
 * @property-read int|null $service_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property int $pay_time
 * @property int $fake
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereFake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePayTime($value)
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Tarif|null $tarif
 * @property int $check_photo_status
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCheckPhotoStatus($value)
 * @property int $sorting
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSorting($value)
 * @property int $phone_view_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePhoneViewCount($value)
 * @property int $pol
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePol($value)
 * @property int $last_phone_view
 * @property int $likes
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Files[] $files
 * @property-read int|null $files_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLastPhoneView($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLikes($value)
 */
class Post extends Model
{

    const POST_ON_MODERATION = 2;
    const POST_ON_PUBLICATION = 1;
    const POST_DONT_PUBLICATION = 0;

    const POST_FAKE = 0;
    const POST_REAL = 1;

    const PHOTO_CHECK_STATUS = 1;
    const PHOTO_NOT_CHECK_STATUS = 0;

    const POL_WOMAN = 0;
    const POL_MAN = 1;
    const POL_TRANS = 2;

    protected $fillable = ['name', 'user_id' , 'phone', 'about', 'price',
        'tarif_id', 'rost', 'ves', 'breast_size', 'city_id', 'age', 'fake', 'publication_status','check_photo_status'];

    public function getPublication()
    {
        switch ($this->publication_status) {

            case self::POST_ON_PUBLICATION:
                return "Снать с публикации";

            case self::POST_DONT_PUBLICATION:
                return "Поставить на публикацию";

            case self::POST_ON_MODERATION:
                return "Анкета на модерации";

        }
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function tarif()
    {
        return $this->hasOne(Tarif::class, 'id', 'tarif_id');
    }

    public function files(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Files::class, 'related_id', 'id')
            ->where(['related_class' => self::class]);
    }

    public function selphi()
    {
        return $this->hasMany(Files::class, 'related_id', 'id')
            ->where(['related_class' => self::class, 'type' => Files::SELPHI_TYPE]);
    }

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

    public function service(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostService::class, 'posts_id', 'id')->with('service');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'related_id', 'id')
            ->where(['related_class' => self::class, 'status' => Comment::PUBLICATION_STATUS]);
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
