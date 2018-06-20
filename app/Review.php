<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * App\Review
 *
 * @property-read  \App\User $users
 * @property-read  mixed $user_login
 * @property-write mixed $format_date
 * @method         static \Illuminate\Database\Query\Builder|\App\Review published()
 * @mixin          \Eloquent
 */
class Review extends Model
{
    use SoftDeletes;

    protected $table = 'reviews';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'text',
        'published'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getUserLoginAttribute($value)
    {
        $user = User::find($value);
        return $this->attributes['user_login'] = $user->login;
    }

    public function setFormatDateAttribute($value)
    {
        $dt = Carbon::parse($value)->format('d.m.Y H:i');
        return $this->attributes['format_date'] = $dt;
    }

    public function scopePublished($query)
    {
        $query->where('published', 1);
    }
}
