<?php

namespace App\Services;

use App\Category;

class CategoryService {
	
	public function all() {

		return Category::where('id', '>', 1)->get();

	}
}