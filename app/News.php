<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * App\News
 *
 * @property-read  \App\User $users
 * @property-read  mixed $short_text
 * @property-write mixed $format_date
 * @mixin          \Eloquent
 */
class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'date',
        'title_ru', 'title_en',
        'text_ru', 'text_en',
        'image'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getShortTextAttribute($value)
    {
        return $this->attributes['short_text'] = mb_strimwidth($value, 0, 100, "...");
    }

    public function getShortTextEnAttribute($value)
    {
        return $this->attributes['short_text_en'] = mb_strimwidth($value, 0, 100, "...");
    }

    public function getShortTextRuAttribute($value)
    {
        return $this->attributes['short_text_ru'] = mb_strimwidth($value, 0, 100, "...");
    }

    public function setFormatDateAttribute($value)
    {
        $dt = Carbon::parse($value)->format('d.m.Y H:i');
        return $this->attributes['format_date'] = $dt;
    }
}
