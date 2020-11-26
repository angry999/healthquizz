<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function(Blueprint $table){
            $table->bigIncrements('ID'); 
            $table->string('SID');            
            $table->time('Time');
            $table->date('Date');   
            $table->string('Reason')->nullable();
            $table->string('Sign')->nullable();     
            $table->string('Status');                   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
