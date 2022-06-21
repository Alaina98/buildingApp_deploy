<?php

namespace App\Mail;
use App\Issues;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IssueRequestSubmitted extends Mailable
{
    use Queueable, SerializesModels;
    public $issue;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Issues $issue)
    {
        //
        $this->issue= $issue;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['name']=$this->issue->name;
        
        return $this->view('emails.Issue-Request-Submitted',$data);
    }
}
