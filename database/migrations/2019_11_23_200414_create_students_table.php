<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cpf')->unique();
            $table->date('birthdate');
            $table->string('email');
            $table->string('cellphone');
            $table->string('address');
            $table->integer('number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state', 2);
            $table->boolean('status');
            $table->integer('course_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses');

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
        Schema::dropIfExists('students');
    }
}
