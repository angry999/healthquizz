<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function(Blueprint $table){
            $table->bigIncrements('ID'); 
            $table->string('FirstName'); //'ID', 'StudentName', 'Department', 'Group', 'Image', 'JoiningDate', 'CurrentStatus'
            $table->string('LastName');
            $table->string('Department');
            $table->string('Group');                              
            $table->date('JoiningDate');            
            $table->string('CurrentStatus');
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();                      
            $table->string('DepartmentFilename')->nullable();
            $table->string('GroupFilename')->nullable();
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
        Schema::dropIfExists('student');
    }
}
