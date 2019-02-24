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
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->integer('point')->nullable();
            $table->boolean('step_1')->default(false);
            $table->boolean('step_2')->default(false);
            $table->boolean('step_3')->default(false);
            $table->boolean('step_4')->default(false);
            $table->time('time')->nullable();


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
