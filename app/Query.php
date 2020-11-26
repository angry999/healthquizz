<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = 'querys';

    protected $fillable = [
        'id', 'query', 'queryname'
    ];

    public $timestamps = false;
}
