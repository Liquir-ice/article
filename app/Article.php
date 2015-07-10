<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [

        'title',

        'body',

        'published_at',

        'user_id' // temporary

    ];

    // any timestamp treat as carbon
    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnPublished($query)
    {
        $query->where('published_at', '>=', Carbon::now());
    }

    // setNameAttribute
    public function setPublishedAtAttribute($date)
    {
        // $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * An article is owned by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User'); //user_id
    }


}
