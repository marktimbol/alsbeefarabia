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

	public function franchiseApplication(User $user) {

		$subject = 'Franchise Application Form';
		$view = 'emails.franchise-application';
		$data = [];

		$this->sendTo($user, $subject, $view, $data);

	}
}