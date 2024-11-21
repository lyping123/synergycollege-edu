<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('full_name', 255);
            $table->string('ic_no', 20);
            $table->string('nationality');
            $table->string('gender');
            $table->string('race');
            $table->string('marital_status');
            $table->text('address');
            $table->string('postcode', 10);
            $table->string('state');
            $table->string('contact_no', 15);
            $table->string('guardian_contact_no', 15);
            $table->string('email', 255)->unique();
            $table->string('course');
            $table->string('secondary_school', 255);
            $table->string('status')->nullable();
            $table->timestamps(); // This will add created_at and updated_at columns
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
