<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Country
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Breed[] $breeds
 * @mixin         \Eloquent
 */
class Country extends Model
{
    protected $table = 'countries';

    protected $primaryKey = 'id';

    protected $fillable = ['name_ru' , 'name_en'];

    public $timestamps = false;

    public function breeds()
    {
        return $this->hasMany('App\Breed', 'country_id');
    }

}
