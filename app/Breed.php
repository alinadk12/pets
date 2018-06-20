<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

/**
 * App\Breed
 *
 * @property-read \App\Country $countries
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dog[] $dogs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Puppy[] $puppies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PuppyRequest[] $requests
 * @property-read mixed $breed_country
 * @mixin         \Eloquent
 */
class Breed extends Model
{
    protected $table = 'breeds';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_ru', 'name_en',
        'country_id',
        'height_ru', 'height_en',
        'weight_ru', 'weight_en',
        'description_ru', 'description_en',
        'image'
    ];

    public $timestamps = false;

    public function countries()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function dogs()
    {
        return $this->hasMany('App\Dog', 'breed_id');
    }

    public function puppies()
    {
        return $this->hasMany('App\Puppy', 'breed_id');
    }

    public function requests()
    {
        return $this->hasMany('App\PuppyRequest', 'breed_id');
    }

    public function getBreedCountryAttribute($value)
    {
        $country = Country::find($value);
        return $this->attributes['breed_country'] = App::isLocale('en') ? $country->name_en : $country->name_ru;
    }
}
