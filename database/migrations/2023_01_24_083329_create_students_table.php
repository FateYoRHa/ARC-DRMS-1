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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('registration_id')->unique();
            $table->string('entrance_status')->nullable();
            $table->integer('student_id')->nullable()->unique();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('course')->nullable();
            // $table->unsignedBigInteger('courseID')->nullable();
            // $table->foreign('courseID')->references('courseID')->on('courses')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('department')->nullable();
            // $table->foreign('departmentID')->references('departmentID')->on('departments')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('school')->nullable();
            $table->string('date')->nullable();
            $table->string('pnum')->nullable();
            $table->string('city_prov')->nullable();
            $table->string('brngy_town')->nullable();
            $table->string('status')->nullable();
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
};
