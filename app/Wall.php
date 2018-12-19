<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    //

    protected $table = 'walls';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeForUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }


}
