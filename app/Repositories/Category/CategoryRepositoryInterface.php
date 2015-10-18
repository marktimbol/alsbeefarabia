<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface {
	
	public function all();

	public function find($id);

	public function store($data);
	
	public function update($id, $data);

	public function delete($id);

	public function addPhoto($id, $filename);

	public function updatePhoto($id, $filename);

	public function deleteExistingPhoto($id, $model);
}