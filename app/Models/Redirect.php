<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Redirect
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect query()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereTo($value)
 * @mixin \Eloquent
 */
class Redirect extends Model
{

    public $timestamps = false;

    public $fillable = ['from', 'to'];

}
