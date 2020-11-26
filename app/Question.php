<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'id', 'question','next_button','multi_selects'
    ];

    public $timestamps = false;
}
