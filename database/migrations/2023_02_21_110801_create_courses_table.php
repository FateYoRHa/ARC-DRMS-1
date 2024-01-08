<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('courseID')->unique()->nullable();
            $table->unsignedBigInteger('departmentID')->nullable();
            $table->foreign('departmentID')->references('departmentID')->on('departments')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('course')->nullable();
            $table->string('course_acronym')->unique()->nullable();
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
        Schema::dropIfExists('courses');
    }
};
