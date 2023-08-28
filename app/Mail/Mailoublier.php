<?php

namespace App\Mail;

use App\Models\User;
//use Hashids\Hashids;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailoublier extends Mailable
{
    use Queueable, SerializesModels;

    public $users; 
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function build()
    {
        $encodedId = base64_encode($this->users->id);
         return $this->subject('Changement de mot passe')
                    ->view('mail.oublierpassword',['encodedId' => $encodedId]);
    }
}
