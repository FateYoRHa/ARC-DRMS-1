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
        Schema::create('student_passports', function (Blueprint $table) {
            // $table->foreignId('registration_id')->constrained();
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')->references('registration_id')->on('students')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // PASSPORT
            $table->integer('student_id')->nullable()->unique();
            $table->string('passport_num')->nullable()->unique();
            $table->date('dpissued')->nullable();
            $table->date('dpexpiry')->nullable();
            $table->string('acr_icard_num')->nullable();


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
        Schema::dropIfExists('student_passports');
    }
};
