<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name',
    	'slug',
    	'description'
    ];

    public function photos() {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function menus() {
    	return $this->hasMany(Menu::class);
    }

    public function setNameAttribute($name) {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name, '-');
    }
}
