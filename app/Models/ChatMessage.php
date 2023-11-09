<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChatMessage
 *
 * @property-read \App\Models\User|null $author
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage query()
 * @mixin \Eloquent
 */
class ChatMessage extends Model
{

    const NOT_READ_STATUS = 0;
    const READ_STATUS = 1;
    const ADMIN_ID = 0;

    protected $fillable = [
        'chat_id',
        'from',
        'message',
        'status',
    ];

    public function author(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'from');
    }

    public function file()
    {
        return $this->hasOne(Files::class, 'id', 'related_id');
    }

}
