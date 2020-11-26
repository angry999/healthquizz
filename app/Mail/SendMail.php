<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $content; 
    public $phone; 
    public $mainurlname; 
    public $mainurladdress; 
    public $cong; 
    public $resulttext; 
    public $title; 
    public $attention; 
    public $clickon; 
    public $clickonfree; 
    public $clickontext; 
    public $download; 
    public $downloadfree; 
    public $downloadtext; 
    public $question; 
    public $these; 
    public $thesefree; 
    public $thesetext; 
    public $link1text; 
    public $link1url; 
    public $change; 
    public $having; 
    public $that; 
    public $three; 
    public $thattext; 
    public $link2text; 
    public $link2url; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $phone, $mainurlname, $mainurladdress, $cong, $attention, $resulttext, $title, $clickon, $clickonfree, $clickontext, $download, $downloadfree, $downloadtext, $question, $these, $thesefree, $thesetext, $link1text, $link1url, $change, $having, $that, $three, $thattext, $link2text, $link2url)
    {
        $this->content = $content; 
        $this->phone = $phone; 
        $this->mainurlname = $mainurlname; 
        $this->mainurladdress = $mainurladdress; 
        $this->cong = $cong; 
        $this->attention = $attention; 
        $this->resulttext = $resulttext; 
        $this->title = $title; 
        $this->clickon = $clickon; 
        $this->clickonfree = $clickonfree; 
        $this->clickontext = $clickontext; 
        $this->download = $download; 
        $this->downloadfree = $downloadfree; 
        $this->downloadtext = $downloadtext; 
        $this->question = $question; 
        $this->these = $these; 
        $this->thesefree = $thesefree; 
        $this->thesetext = $thesetext; 
        $this->link1text = $link1text; 
        $this->link1url = $link1url; 
        $this->change = $change; 
        $this->having = $having; 
        $this->that = $that; 
        $this->three = $three; 
        $this->thattext = $thattext; 
        $this->link2text = $link2text; 
        $this->link2url = $link2url; 
    }
 
    public function build()
    {
        return $this->from('support@radiantshentiquiz.com')
        ->view('email')
        ->subject('Radiant Shenti Body Type Results');
 
    }
    
    
}
