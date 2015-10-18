<?php

namespace App\Mailers;

use App\User;

class AdminMailer extends Mailer {


	public function franchiseApplication(User $admin, User $userData) {

		$subject = 'Franchise Application Form';
		$view = 'emails.franchise-application';
		$data = $userData->toArray();

		$this->sendTo($admin, $subject, $view, $data);

	}
}