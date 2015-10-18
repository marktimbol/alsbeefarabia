<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

	protected $fillable = [
		'name',
        'slug',
        'description',
        'address',
        'contact',
        'latitude',
        'longitude'
	];

    public function photos() {

    	return $this->morphMany(Photo::class, 'imageable');
   
    }

    public function setNameAttribute($name) {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name, '-');
    }
}
