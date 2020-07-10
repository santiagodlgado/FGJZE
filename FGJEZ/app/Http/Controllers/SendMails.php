<?php
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMails extends Mailable{
    use Queueable, SerializesModels;
    
    
    public function __construct()
    {
    }
    
    public function build()
    {
        return $this->view('userData.mailss');
    }
    
}