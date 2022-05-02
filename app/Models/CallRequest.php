<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CallRequest
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $posts_id
 * @property string $phone
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest wherePostsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CallRequest extends Model
{
    protected $fillable = [
        'posts_id', 'phone'
    ];

}
