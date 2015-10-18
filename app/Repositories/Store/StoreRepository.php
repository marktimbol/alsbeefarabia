<?php

namespace App\Repositories\Store;

use App\Photo;
use App\Store;
use Illuminate\Support\Facades\File;

class StoreRepository implements StoreRepositoryInterface {
	
	public function all() {
	
		return Store::with('photos')->latest()->get();
	
	}


	public function find($id) {
	
		return Store::with('photos')->findOrFail($id);
	
	}

	public function store($data) {

		return Store::create($data);
	
	}

	public function update($id, $data) {
		
		$store = $this->find($id);
		
		$store->fill($data);
		
		$store->save();

	}

	public function delete($id) {

		$store = $this->find($id);
		
		/**
		 * Delete the record from the "stores" table
		 */
		$store->delete();

		/**
		 * Delete image from the directory
		 */
		$this->deleteExistingPhoto($id, 'Store');

	}

	public function addPhoto($id, $filename) {

		session(['filename' => '']);

		$store = $this->find($id);

		$photo = new Photo;

		$photo->path = $filename;

		return $store->photos()->save($photo);

	}	

	public function updatePhoto($id, $filename) {
		
		$this->deleteExistingPhoto($id, 'Store');
		
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