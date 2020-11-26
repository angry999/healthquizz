<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    public $timestamps = false;
    protected $fillable = [
        'id', 'answer','question_id'
    ];
}
