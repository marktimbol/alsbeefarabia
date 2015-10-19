<?php

namespace App\Mailers;

use App\User;

class UserMailer extends Mailer {

	public function welcome(User $user) {

		$subject = 'Welcome';
		$view = 'emails.welcome';
		$data = [];

		$this->sendTo($user, $subject, $view, $data);

	}
}