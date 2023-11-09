<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $related_class
 * @property int $related_id
 * @property string $text
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRelatedClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @property-read \App\Models\Post|null $post
 */
class Comment extends Model
{

    const MODERATION_STATUS = 0;
    const PUBLICATION_STATUS = 1;

    protected $fillable = [
        'name', 'related_id', 'related_class', 'text'
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'related_id')
            ->with('avatar', 'city');
    }
}
