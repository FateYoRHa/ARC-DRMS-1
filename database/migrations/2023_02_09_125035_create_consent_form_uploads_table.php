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
        Schema::create('consent_form_uploads', function (Blueprint $table) {
            $table->unsignedBigInteger('upload_id')->unique();
            $table->foreign('upload_id')->references('registration_id')->on('students')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->integer('student_id')->unique()->nullable();
            $table->string('filename')->nullable()->unique();
            $table->string('filepath')->nullable();
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
        Schema::dropIfExists('consent_form_uploads');
    }
};
