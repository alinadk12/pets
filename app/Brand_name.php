<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Brand_name
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Good[] $goods
 * @mixin         \Eloquent
 */
class Brand_name extends Model
{
    protected $table = 'brands';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function goods()
    {
        return $this->hasMany('App\Good', 'brand_id');
    }
}
