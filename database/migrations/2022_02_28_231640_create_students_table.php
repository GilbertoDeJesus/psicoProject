<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name',100);
            $table->string('family_name',60);
            $table->string('last_name',60);
            $table->foreignId('educative_program_id')->constrained();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('phone',15);
            $table->string('contact_phone',15);
            $table->string('email',300);
            $table->string('matricula',15);
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups');
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
