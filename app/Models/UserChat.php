<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserChat
 *
 * @property int $id
 * @property int $chat_id
 * @property int $user_id
 * @property-read \App\Models\ChatMessage|null $last
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatMessage[] $message
 * @property-read int|null $message_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatMessage[] $notRead
 * @property-read int|null $not_read_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat whereUserId($value)
 * @mixin \Eloquent
 */
class UserChat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'chat_id',
        'user_id',
    ];

    public function message(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'chat_id');
    }

    public function last(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ChatMessage::class, 'chat_id', 'chat_id')
            ->with('author')
            ->orderByDesc('id');
    }

    public function notRead(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'chat_id')
            ->where('status', ChatMessage::NOT_READ_STATUS)
            ->where('from', ChatMessage::ADMIN_ID);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
