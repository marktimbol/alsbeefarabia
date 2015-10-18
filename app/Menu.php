<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'category_id',
    	'name',
    	'slug',
    	'price',
    	'description'
    ];

    public function photos() {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function categories() {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name, '-');
    }
}
