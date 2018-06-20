<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Sold_good
 *
 * @property-read \App\Good $goods
 * @property-read \App\User $users
 * @property-read \App\User $employees
 * @mixin         \Eloquent
 */
class Sold_good extends Model
{
    use SoftDeletes;

    protected $table = 'sold_goods';

    protected $primaryKey = 'id';

    protected $fillable = [
        'good_id',
        'user_id',
        'employee_id',
        'date'
    ];

    public function goods()
    {
        return $this->belongsTo('App\Good', 'good_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function employees()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }
}
