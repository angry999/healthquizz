<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendFreeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $content; 
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content )
    {
        $this->content = $content; 
    }
 
    public function build()
    {
        return $this->from('support@yourelementalwisdom.com')
        ->view('freeemail')
        ->subject('Elemental Wisdom Body Constitution Action Plan');

        // return $this->view('email');
        // return $this->from('chenming.biz@gmail.com')->subject('New Customer Equiry')->view('home')->with('data', $this->data);
    }
    
    
}
