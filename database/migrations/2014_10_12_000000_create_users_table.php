<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('lastname',200);
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('educative_program_id')->nullable();
            $table->string('employee_key',15)->unique();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('educative_program_id')->references('id')->on('educative_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
