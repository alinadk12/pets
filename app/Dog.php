<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App;

/**
 * App\Dog
 *
 * @property-read  \App\Breed $breeds
 * @property-read  \Illuminate\Database\Eloquent\Collection|\App\Puppy[] $females_puppies
 * @property-read  \Illuminate\Database\Eloquent\Collection|\App\Puppy[] $males_puppies
 * @property-write mixed $breed_name
 * @property-write mixed $format_date
 * @method         static \Illuminate\Database\Query\Builder|\App\Dog males()
 * @method         static \Illuminate\Database\Query\Builder|\App\Dog females()
 * @mixin          \Eloquent
 */
class Dog extends Model
{
    use SoftDeletes;

    protected $table = 'dogs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'breed_id',
        'name_ru', 'name_en',
        'gender',
        'birthdate',
        'color_ru', 'color_en',
        'description_ru', 'description_en',
        'image'
    ];

    public function breeds()
    {
        return $this->belongsTo('App\Breed', 'breed_id');
    }

    public function females_puppies()
    {
        return $this->hasMany('App\Puppy', 'female_id');
    }

    public function males_puppies()
    {
        return $this->hasMany('App\Puppy', 'male_id');
    }

    public function setBreedNameAttribute($value)
    {
        $breed = Breed::find($value);
        return $this->attributes['breed_name'] = App::isLocale('en') ? $breed->name_en : $breed->name_ru;
    }

    public function setFormatDateAttribute($value)
    {
        $dt = Carbon::parse($value)->format('d.m.Y');
        return $this->attributes['format_date'] = $dt;
    }

    public function scopeMales($query)
    {
        return $query->where('gender', 1);
    }

    public function scopeFemales($query)
    {
        return $query->where('gender', 0);
    }
}
