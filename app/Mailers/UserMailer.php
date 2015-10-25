<?php

namespace App\Mailers;

use App\User;

class UserMailer extends Mailer {

	public function autoReply($email) {

		$subject = 'RE: Contact Us';
		$view = 'emails.auto-reply';
		$data = [];

		$this->sendTo($email, $subject, $view, $data);

	}
}