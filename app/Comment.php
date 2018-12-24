<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $table = 'wall_message_comments';
    protected $fillable = ['user_id', 'wall_message_id', 'body', 'votes','spam', 'reply_id'];
    protected $dates = ['created_at', 'updated_at'];


    public function replies()
    {
        return $this->hasMany(self::class, 'id', 'reply_id');
    }

    // Получить Пост с данным комментарием
    public function wall()
    {
        return $this->belongsTo(Wall::class, 'wall_message_id', 'id');
    }

    // Получить пользователя с данным комментарием
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeForUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }



}
