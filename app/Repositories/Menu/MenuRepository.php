<?php

namespace App\Repositories\Menu;

use App\Menu;
use App\Photo;
use Illuminate\Support\Facades\File;

class MenuRepository implements MenuRepositoryInterface {
	
	public function all() {

		return Menu::with('categories')->latest()->paginate(15);
	
	}


	public function find($id) {
	
		return Menu::with('categories')->findOrFail($id);
	
	}

	public function store($data) {
		
	}

	public function update($id, $data) {
		
		$menu = $this->find($id);
		
		$menu->fill($data);
		
		$menu->save();


	}

	public function delete($id) {

		$menu = $this->find($id);
		
		/**
		 * Delete the record from the "categories" table
		 */
		$menu->delete();

		/**
		 * Delete image from the directory
		 */
		$this->deleteExistingPhoto($id, 'Menu');


	}

	public function addPhoto($id, $filename) {

		$menu = Menu::findOrFail($id);

		$photo = new Photo;
		$photo->path = $filename;

		$menu->photos()->save($photo);

		session(['filename' => '']);
	}	

	public function updatePhoto($id, $filename) {
		
		 $this->deleteExistingPhoto($id, 'Menu');

        $this->addPhoto($id, $filename);

	}

	public function deleteExistingPhoto($id, $model) {

		$model = 'App\\'.$model;

		$oldPhoto = Photo::where('imageable_type', $model)
							->where('imageable_id', $id)->firstOrFail();

		$oldPhotoPath = public_path('images/uploads/'.$oldPhoto->path);

        if( File::isFile($oldPhotoPath) ) {

            File::delete( $oldPhotoPath );

        }	

        $oldPhoto->delete();

	}		


}