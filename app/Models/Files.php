<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Files extends Model
{

    public $timestamps = false;

    const SELPHI_TYPE = 3;
    const VIDEO_TYPE = 2;
    const MAIN_PHOTO_TYPE = 1;
    const GALLERY_PHOTO_TYPE = 0;
}
