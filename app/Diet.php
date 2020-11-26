<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    protected $table = 'diets';

    protected $fillable = [
        'id', 'name'
    ];

    public $timestamps = false;
}
