<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';

    protected $fillable = [
        'id', 'email', 'content', 'created_at'
    ];

    public $timestamps = false;
}
