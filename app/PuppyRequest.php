<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App;

/**
 * App\PuppyRequest
 *
 * @property-read \App\User $users
 * @property-read \App\Breed $breeds
 * @mixin         \Eloquent
 */
class PuppyRequest extends Model
{
    use SoftDeletes;

    protected $table = 'requests';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'breed_id',
        'gender',
        'age_month',
        'max_price',
        'comments',
        'reply'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function breeds()
    {
        return $this->belongsTo('App\Breed', 'breed_id');
    }

    public function setBreedNameAttribute($value)
    {
        $breed = Breed::find($value);
        return $this->attributes['breed_name'] = App::isLocale('en') ? $breed->name_en : $breed->name_ru;
    }

    public function setUserLoginAttribute($value)
    {
        $user = User::find($value);
        return $this->attributes['user_login'] = $user->login;
    }

    public function setFormatDateAttribute($value)
    {
        $dt = Carbon::parse($value)->format('d.m.Y H:i');
        return $this->attributes['format_date'] = $dt;
    }

    public function scopeReply($query)
    {
        return $query->where('reply', 1);
    }

    public function scopeNoReply($query)
    {
        return $query->where('reply', 0);
    }
}
