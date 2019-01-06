<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTeacher extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userName;
    public $phoneNumber;
    public $teacherType;
    public $salary;
    public $days;
    public $locationName;
    public $className;
    public $experience;
    public $title;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postById)
    {
      //  dd($postById);
        $this->userName=$postById->name;
        $this->phoneNumber=$postById->phone_number;
        $this->teacherType=$postById->teacher_type;
        $this->salary=$postById->expected_amount;
        $this->days=$postById->days;
        $this->locationName=$postById->location_name;
        $this->className=$postById->class_name;
        $this->experience=$postById->experience;
        $this->title=$postById->subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.teacherMail')
            ->subject('New tuition post submit');
    }
}
