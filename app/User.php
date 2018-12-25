<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanFavorite;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanLike;


/**
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $first_name
 * @property string $email

 */

class User extends Authenticatable
{
    use Notifiable, CanFollow, CanBeFollowed, CanLike, CanFavorite;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'first_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }


    // Получить все посты этого пользователя
    public function walls()
    {
        return $this->hasMany(Wall::class);
    }

    // Получить все комментария этого пользователя
    public function comments()
    {
        return $this->hasMany(Wall::class);
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }


    public function getComments()
    {
        return $this->comments()->where('user_id', auth()->user())->get();
    }

    public function scopeForUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function uploadAvatar($image)
    {
        if($image == null) { return; }
        $this->removeAvatar();

        $filename  =  auth()->id() . '_'. str_random(10) . '.' . $image->extension();
//        $image->storeAs('uploads/persons/original', $filename);

//        $path = public_path('uploads/users/'. auth()->id() .'/original/' . $filename);
//        $path_th = public_path('uploads/users/'. auth()->id() .'/thumbnail/thumbnail_' . $filename);

        $path = 'public/uploads/users/'. auth()->id() .'/original/' ;
        $path_th = 'public/uploads/users/'. auth()->id() .'/thumbnail/' ;


        $image->storeAs($path, $filename);
        $image->storeAs($path_th, 'thumbnail_'. $filename);


//        Image::make($image)->widen(100)->save($path_th);
//        Image::make($image->getRealPath())->save($path);

        $this->avatar = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if($this->avatar != null)
        {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

    public function getImageThumbnail($userId)
    {
        $user = User::where('id', '=', $userId)->firstOrFail();

        if($user->avatar == null)
        {
            return '/storage/uploads/users/no-avatar.png';
        }
        $url = 'storage/uploads/users/'. auth()->id() .'/original/';
        $path = $url . $user->avatar;

        return $path;

    }

}
