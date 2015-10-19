<?php

namespace App\Mailers;

class AdminMailer extends Mailer {


	public function contact($admin, $userData) {

		$subject = 'Contact Form';
		$view = 'emails.admin.contact';
		$data = $userData;

		
		$this->sendTo($admin, $subject, $view, $data);

	}
}