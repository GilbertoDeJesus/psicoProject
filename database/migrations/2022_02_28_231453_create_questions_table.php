<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question',300);
            $table->boolean('status')->default(1);
            $table->boolean('is_example')->default(0);
            $table->mediumInteger('order');
            $table->foreignId('type_id')->constrained();
            $table->unsignedBigInteger('educative_program_id')->nullable();
            $table->foreign('educative_program_id')->references('id')->on('educative_programs');
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
        Schema::dropIfExists('questions');
    }
}
