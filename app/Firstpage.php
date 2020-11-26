<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firstpage extends Model
{
    protected $table = 'firstpages';

    protected $fillable = [
        'id', 'top_title','top_title_body','top_text1','top_text2','top_text3','top_image','bottom_title','bottom_text1','bottom_text2','bottom_text3','bottom_image','contact_us'
    ];

    public $timestamps = false;
}
