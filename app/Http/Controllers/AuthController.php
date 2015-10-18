<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	public function getLogin() {
		return view('auth.login');
	}

	public function postLogin(AuthLoginRequest $request) {	
		$credentials = [
			'email'	=> $request->email,
			'password'	=> $request->password
		];

		if( auth()->attempt($credentials, $request->remember) ) {
			return redirect()->intended('admin');
		}

		return redirect()->back()->with('loginError', 'Email / Password combination is incorrect.');
	}

	public function getLogout() {
		auth()->logout();

		flash()->success('Yay!', 'You have successfully logged-out.');
		
		return redirect()->route('home');
	}

	public function getRegister() {
		return view('auth.register');
	}

	public function postRegister(AuthRegisterRequest $request) {

		$user = User::create($request->all());
		
		flash()->overlay('Yay!', 'Thank you for registering with us.');

		return redirect('/auth/login');

	}

}
