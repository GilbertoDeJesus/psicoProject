<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_orientacional1_id')->nullable();
            $table->unsignedBigInteger('test_orientacional2_id')->nullable();
            $table->unsignedBigInteger('test_orientacional3_id')->nullable();
            $table->string('test_aprendizaje',50)->nullable();
            $table->string('test_status_academico',50)->nullable();
            $table->string('test_advanced_academico',50)->nullable();
            $table->foreignId('student_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('test_orientacional1_id')->references('id')->on('educative_programs');
            $table->foreign('test_orientacional2_id')->references('id')->on('educative_programs');
            $table->foreign('test_orientacional3_id')->references('id')->on('educative_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
