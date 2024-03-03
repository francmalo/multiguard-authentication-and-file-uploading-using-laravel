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
            $table->bigIncrements('id');
            $table->string('admission_number')->unique();
            $table->string('student_name');
            $table->string('student_gender');
            $table->string('student_email')->unique();
            $table->timestamp('student_email_verified_at')->nullable();
            $table->string('student_phone');
            $table->string('student_id')->unique();
            $table->string('photo')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('kcse_certificate')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_gender');
            $table->string('guardian_email')->unique();
            $table->timestamp('guardian_email_verified_at')->nullable();
            $table->string('guardian_phone');
            $table->string('guardian_id')->unique();;
            $table->string('guardian_relation');
            $table->string('password');
            $table->rememberToken();
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
