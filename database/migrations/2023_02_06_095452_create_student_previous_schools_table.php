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
        Schema::create('student_previous_schools', function (Blueprint $table) {
            // PREV SCHOOL
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')->references('registration_id')->on('students')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('last_school_name')->nullable();
            $table->string('year_graduated')->nullable();
            $table->string('prev_sch_bnlb')->nullable();
            $table->string('prev_school_bname')->nullable();
            $table->string('prev_sch_str_name')->nullable();
            $table->string('prev_sch_brngy_name')->nullable();
            $table->string('prev_sch_city_town')->nullable();
            $table->string('prev_sch_prov')->nullable();
            $table->string('prev_sch_reg')->nullable();
            $table->string('prev_sch_country')->nullable();
            $table->integer('prev_sch_zip')->nullable();

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
        Schema::dropIfExists('student_previous_schools');
    }
};
