<?php

namespace App\Repositories\Category;

use App\Category;
use App\Photo;
use Illuminate\Support\Facades\File;

class CategoryRepository implements CategoryRepositoryInterface {
	
	public function all() {
	
		return Category::with('menus', 'photos')->latest()->get();
	
	}


	public function find($id) {
	
		return Category::with('menus', 'photos')->findOrFail($id);
	
	}

	public function store($data) {

		return Category::create($data);
	
	}

	public function update($id, $data) {
		
		$category = $this->find($id);
		
		$category->fill($data);
		
		$category->save();

	}

	public function delete($id) {

		$category = $this->find($id);
		
		/**
		 * Delete the record from the "categories" table
		 */
		$category->delete();

		/**
		 * Delete image from the directory
		 */
		$this->deleteExistingPhoto($id, 'Category');

	}

	public function addPhoto($id, $filename) {

		//session(['filename' => '']);

		$category = $this->find($id);

		$photo = new Photo;

		$photo->path = $filename;

		return $category->photos()->save($photo);

		
	}	

	public function updatePhoto($id, $filename) {
		
        $this->deleteExistingPhoto($id, 'Category');
		
		$this->addPhoto($id, $filename);

	}

	public function deleteExistingPhoto($id, $model) {

		$model = 'App\\'.$model;

		$oldPhoto = Photo::where('imageable_type', $model)
							->where('imageable_id', $id)->firstOrFail()
							->delete();

		// $oldPhotoPath = public_path('images/uploads/'.$oldPhoto->path);

  //       if( File::isFile($oldPhotoPath) ) {

  //           File::delete( $oldPhotoPath );

  //       }	

	}	

}