<?php

namespace App\Mailers;

class AdminMailer extends Mailer {


	public function contact($email, $userData) {

		$subject = 'Contact Form';
		$view = 'emails.admin.contact';
		$data = $userData;

		
		$this->sendTo($email, $subject, $view, $data);

	}
}