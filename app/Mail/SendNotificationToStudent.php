<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToStudent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userName;
    public $phoneNumber;
    public $lookingFor;
    public $salary;
    public $days;
    public $locationName;
    public $className;
    public $experience;
    public $availableSit;
    public $title;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postInfo)
    {
        $this->userName=$postInfo->name;
        $this->phoneNumber=$postInfo->phone_number;
        $this->lookingFor=$postInfo->looking_for;
        $this->salary=$postInfo->expected_amount;
        $this->days=$postInfo->days;
        $this->locationName=$postInfo->location_name;
        $this->className=$postInfo->class_name;
        $this->experience=$postInfo->experience;
        $this->availableSit=$postInfo->available_sit;
        $this->title=$postInfo->subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.studentMail')->subject('New tuition post submit');
    }
}
