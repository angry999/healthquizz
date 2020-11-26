<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailpage extends Model
{
    protected $table = 'emailpages';

    protected $fillable = [
        'id', 'phone', 'mainurlname', 'mainurladdress', 'cong', 'attention', 'resulttext', 'title', 'clickon', 'clickonfree', 'clickontext', 'download', 'downloadfree', 'downloadtext', 'question', 'these', 'thesefree', 'thesetext', 'link1text', 'link1url', 'change', 'having', 'that', 'three', 'thattext', 'link2text', 'link2url'
    ];

    public $timestamps = false;
}
