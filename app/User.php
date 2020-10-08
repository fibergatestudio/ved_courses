<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'name', 'patronymic', 'email', 'provider', 'provider_id', 'password', 'role', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerMediaConversions(Media $media = null){
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    // Проверка, является ли пользователь администратором
    public function isAdmin(){
        if($this->role == 'admin')
        {
            return true;
        } else{
            return false;
        }
    }

    // Студентом
    public function isStudent(){
        if($this->role == 'student')
        {
            return true;
        } else{
            return false;
        }
    }

    // Учитилем
    public function isTeacher(){
        if($this->role == 'teacher')
        {
            return true;
        } else{
            return false;
        }
    }
}
