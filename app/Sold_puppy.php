<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Sold_puppy
 *
 * @property-read \App\Puppy $puppies
 * @property-read \App\User $users
 * @property-read \App\User $employees
 * @mixin         \Eloquent
 */
class Sold_puppy extends Model
{
    use SoftDeletes;

    protected $table = 'sold_puppies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'puppy_id',
        'user_id',
        'employee_id',
        'date'
    ];

    public function puppies()
    {
        return $this->belongsTo('App\Puppy', 'puppy_id');
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
