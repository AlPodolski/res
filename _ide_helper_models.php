<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Age
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Age newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Age newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Age query()
 * @method static \Illuminate\Database\Eloquent\Builder|Age whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Age whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Age whereValue($value)
 * @mixin \Eloquent
 */
	class Age extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $url
 * @property string $city
 * @property string $city2
 * @property string $city3
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCity2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCity3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUrl($value)
 * @mixin \Eloquent
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Files
 *
 * @property int $id
 * @property int $related_id
 * @property string $related_class
 * @property string $file
 * @property int $type
 * @method static \Illuminate\Database\Eloquent\Builder|Files newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Files newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Files query()
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereRelatedClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereType($value)
 * @mixin \Eloquent
 */
	class Files extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\Service|null $service
 */
	class Filter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HairColor
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HairColor whereValue($value)
 * @mixin \Eloquent
 */
	class HairColor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\IntimHair
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string|null $value2
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair query()
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntimHair whereValue2($value)
 * @mixin \Eloquent
 */
	class IntimHair extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Meta
 *
 * @property int $id
 * @property string $url
 * @property string $title
 * @property string $des
 * @property string $h1
 * @method static \Illuminate\Database\Eloquent\Builder|Meta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereDes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereUrl($value)
 * @mixin \Eloquent
 */
	class Meta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Metro
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string|null $value2
 * @property float|null $x
 * @property float|null $y
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereValue2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereY($value)
 * @mixin \Eloquent
 */
	class Metro extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\National
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string $value2
 * @method static \Illuminate\Database\Eloquent\Builder|National newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|National newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|National query()
 * @method static \Illuminate\Database\Eloquent\Builder|National whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|National whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|National whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|National whereValue2($value)
 * @mixin \Eloquent
 */
	class National extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Place
 *
 * @property int $id
 * @property string $value
 * @property string $url
 * @method static \Illuminate\Database\Eloquent\Builder|Place newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Place newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Place query()
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereValue($value)
 * @mixin \Eloquent
 */
	class Place extends \Eloquent {}
}

namespace App\Models{
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
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PostHairColor
 *
 * @property int $id
 * @property int $posts_id
 * @property int $hair_colors_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor whereHairColorsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor wherePostsId($value)
 * @mixin \Eloquent
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostHairColor whereCityId($value)
 * @property-read \App\Models\HairColor|null $hair
 */
	class PostHairColor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PostIntimHair
 *
 * @property int $id
 * @property int $posts_id
 * @property int $intim_hair_id
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair whereIntimHairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostIntimHair wherePostsId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\IntimHair|null $value
 */
	class PostIntimHair extends \Eloquent {}
}

namespace App\Models{
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
	class PostMetro extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostNational whereCityId($value)
 */
	class PostNational extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PostPlace
 *
 * @property int $id
 * @property int $place_id
 * @property int $post_id
 * @property int $city_id
 * @property-read \App\Models\Place|null $place
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace wherePlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostPlace wherePostId($value)
 * @mixin \Eloquent
 */
	class PostPlace extends \Eloquent {}
}

namespace App\Models{
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
	class PostRayon extends \Eloquent {}
}

namespace App\Models{
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
 */
	class PostService extends \Eloquent {}
}

namespace App\Models{
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
	class PostTime extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereValue($value)
 * @mixin \Eloquent
 */
	class Price extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rayon
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string|null $value2
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rayon whereValue2($value)
 * @mixin \Eloquent
 */
	class Rayon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @property string $value2
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereValue2($value)
 * @mixin \Eloquent
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Time
 *
 * @property int $id
 * @property string $url
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Time newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Time newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Time query()
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereValue($value)
 * @mixin \Eloquent
 */
	class Time extends \Eloquent {}
}

namespace App\Models{
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
	class TopList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 */
	class User extends \Eloquent {}
}

