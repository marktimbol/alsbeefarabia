<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Mailers\AdminMailer;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendUserInformationToAdmin extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    public $name;

    public $phone;

    public $email;

    public $message;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $message_content)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message_content;   

        $this->handle(new AdminMailer);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(AdminMailer $mailer)
    {

        $user = [
            'name'  => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'message_content'   => $this->message
        ];

        $mailer->contact( env('MAIL_FROM_ADDRESS'), $user);
    }
}
