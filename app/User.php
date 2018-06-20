<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sold_good[] $sold_goods_users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sold_good[] $sold_goods_employees
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sold_puppy[] $sold_puppy_users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sold_puppy[] $sold_puppy_employees
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\News[] $news
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PuppyRequest[] $requests
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @mixin         \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $guarded = ['token'];

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'email',
        'login',
        'password',
        'phone_number',
        'image'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function sold_goods_users()
    {
        return $this->hasMany('App\Sold_good', 'user_id');
    }

    public function sold_goods_employees()
    {
        return $this->hasMany('App\Sold_good', 'employee_id');
    }

    public function sold_puppy_users()
    {
        return $this->hasMany('App\Sold_puppy', 'user_id');
    }

    public function sold_puppy_employees()
    {
        return $this->hasMany('App\Sold_puppy', 'employee_id');
    }

    public function news()
    {
        return $this->hasMany('App\News', 'user_id');
    }

    public function requests()
    {
        return $this->hasMany('App\PuppyRequest', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'user_id');
    }

    public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name) {
                return true;
            }
        }
        return false;
    }
}
