<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Group extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function(Blueprint $table){
            $table->bigIncrements('ID'); 
            $table->string('DID');
            $table->string('Department');
            $table->string('GroupName');
            $table->time('StartTime1');
            $table->date('GroupDate1');
            $table->string('GroupDay1');
            $table->time('StartTime2')->nullable();
            $table->date('GroupDate2')->nullable();
            $table->string('GroupDay2')->nullable();
            $table->time('StartTime3')->nullable();
            $table->date('GroupDate3')->nullable();
            $table->string('GroupDay3')->nullable();
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();   
            $table->string('DepartmentFilename')->nullable();             
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
        Schema::dropIfExists('group');
    }
}
