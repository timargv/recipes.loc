<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Wall extends Model
{
    //
    use CanBeLiked, CanBeFavorited;

    protected $table = 'walls';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'wall_message_id', 'id');
    }

    public function scopeForUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function getCommentsCount()
    {
//        return $this->comments()->count();
        return $this->comments()->selectRaw('wall_message_id, count(*) as count')->groupBy('wall_message_id')->count();
    }


}
