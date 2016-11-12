<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Article extends Model
{
    use AlgoliaEloquentTrait;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $appends = ['tag_list', 'body_html'];
    protected $fillable = ['title', 'body', 'slug', 'click', 'user_id', 'category_id', 'original', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function getTagListAttribute()
    {
        return $this->tags->pluck('id');
    }
    public function setCreatedAtAttribute($date)
    {
        if (is_string($date)) {
            $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
        } else {
            $this->attributes['created_at'] = $date;
        }
    }
    public function setSlugAttribute($data)
    {
        $this->attributes['slug'] = str_slug($data);
    }
    public function scopeFindBySlug($query, $slug)
    {
        return $query->whereSlug($slug)->firstOrFail();
    }
}
