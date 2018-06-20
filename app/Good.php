<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;

/**
 * App\Good
 *
 * @property-read \App\Brand_name $brand_names
 * @property-read \App\Good_type $good_types
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sold_good[] $sold_goods
 * @property-read mixed $good_brand
 * @property-read mixed $good_type
 * @mixin         \Eloquent
 */
class Good extends Model
{
    use SoftDeletes;

    protected $table = 'goods';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_ru', 'name_en',
        'type_id',
        'brand_name_id',
        'description_ru', 'description_en',
        'price',
        'image',
        'amount'
    ];

    public function brand_names()
    {
        return $this->belongsTo('App\Brand_name', 'brand_id');
    }

    public function good_types()
    {
        return $this->belongsTo('App\Good_type', 'type_id');
    }

    public function sold_goods()
    {
        return $this->hasMany('App\Sold_good', 'good_id');
    }

    public function setGoodBrandAttribute($value)
    {
        $brand = Brand_name::find($value);
        return $this->attributes['good_brand'] = $brand->name;
    }

    public function setGoodTypeAttribute($value)
    {
        $type = Good_type::find($value);
        return $this->attributes['good_type'] = App::isLocale('en') ? $type->type_en : $type->type_ru;
    }
}
