<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Good_type
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Good[] $goods
 * @mixin         \Eloquent
 */
class Good_type extends Model
{
    protected $table = 'good_types';

    protected $primaryKey = 'id';

    protected $fillable = ['type_ru', 'type_en'];

    public $timestamps = false;

    public function goods()
    {
        return $this->hasMany('App\Good', 'type_id');
    }
}
