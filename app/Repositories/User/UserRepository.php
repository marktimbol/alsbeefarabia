<?php

namespace App\Repositories\User;

use App\User;

class UserRepository implements UserRepositoryInterface {
	
	public function all() {

	}

	public function find($id) {

		return User::findOrFail($id);

	}	

	public function store($data) {	

		return User::create($data);

	}
	
	public function update($id, $data) {

	}

}