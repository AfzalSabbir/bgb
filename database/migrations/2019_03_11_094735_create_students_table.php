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
            $table->string('name');
            $table->unsignedInteger('roll');
            $table->unsignedInteger('registration')->unique();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('student_mobile')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->date('dob')->nullable();
            $table->unsignedtinyInteger('religion')->comment('1-Islam | 2-Hindu | 3-Christian | 4-Buddhist | 5-Other');
            $table->unsignedtinyInteger('gender')->comment('1-Male | 2-Female | 3-Other');
            $table->string('blood_group', 10)->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanenent_address')->nullable();
            $table->string('class', 10)->nullable();
            $table->string('section', 10)->nullable();
            $table->string('group', 50)->nullable();
            $table->string('year', 20)->nullable();
            $table->unsignedtinyInteger('shift')->nullable();
            $table->unsignedtinyInteger('status')->default(1);
            $table->string('fourth_subject', 100)->nullable();
            $table->string('photo')->nullable();
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
