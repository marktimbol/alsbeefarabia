<?php

namespace App\Repositories\Slide;

use App\Photo;
use App\Slide;
use Illuminate\Support\Facades\File;

class SlideRepository implements SlideRepositoryInterface {
	
	public function all() {
	
		return Slide::with('photos')->latest()->get();
	
	}

	public function find($id) {
	
		return Slide::with('photos')->findOrFail($id);
	
	}

	public function store($data) {

		return Slide::create($data);
	
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
		$this->deleteExistingPhoto($id, 'Slide');

	}

	public function addPhoto($id, $filename) {

		session(['filename' => '']);

		$slide = $this->find($id);

		$photo = new Photo;

		$photo->path = $filename;

		return $slide->photos()->save($photo);

		
	}	

	public function updatePhoto($id, $filename) {
		
		$this->deleteExistingPhoto($id, 'Slide');

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