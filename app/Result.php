<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    protected $fillable = [
        'id', 'answer_id','content'
    ];

    public $timestamps = false;
}