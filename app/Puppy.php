<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Puppy
 *
 * @property-read \App\Breed $breeds
 * @property-read \App\Dog $males
 * @property-read \App\Dog $females
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sold_puppy[] $sold_puppies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vaccination_puppy[] $vaccinations
 * @mixin         \Eloquent
 */
class Puppy extends Model
{
    use SoftDeletes;

    protected $table = 'puppies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'breed_id',
        'birthdate',
        'gender',
        'color_ru', 'color_en',
        'notes_ru', 'notes_en',
        'male_id',
        'female_id',
        'image',
        'price'
    ];

    public function breeds()
    {
        return $this->belongsTo('App\Breed', 'breed_id');
    }

    public function males()
    {
        return $this->belongsTo('App\Dog', 'male_id');
    }

    public function females()
    {
        return $this->belongsTo('App\Dog', 'female_id');
    }

    public function sold_puppies()
    {
        return $this->hasMany('App\Sold_puppy', 'puppy_id');
    }

    public function vaccinations()
    {
        return $this->hasMany('App\Vaccination_puppy', 'puppy_id');
    }
}
