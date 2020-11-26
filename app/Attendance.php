<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'ID', 'SID', 'Date', 'Time', 'Reason', 'Sign'
    ];

    public $timestamps = false;
}
