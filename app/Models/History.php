<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\History
 *
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property int $sum
 * @property int $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History query()
 * @method static \Illuminate\Database\Eloquent\Builder|History whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereUserId($value)
 * @mixin \Eloquent
 */
class History extends Model
{

    public $timestamps = false;

    const PAY_FOR_POST_PUBLICATION_TYPE = 1;
    const REPLENISHMENT_TYPE = 2;
}
