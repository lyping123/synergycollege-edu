<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Reference to the students table
            $table->string('verification_code');
            $table->timestamp('expires_at')->nullable(); // Expiration for the code
            $table->boolean('is_verified')->default(false); // Whether the verification was successful
            $table->timestamps();

            // Foreign key to link to the student
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_verifications');
    }
}
