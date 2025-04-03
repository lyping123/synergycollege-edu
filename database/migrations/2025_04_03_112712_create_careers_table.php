<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string("e_name");
            $table->string("e_ic");
            $table->longText("e_address");
            $table->string("e_quanlification");
            $table->string("e_mstatus");
            $table->string("e_email");
            $table->string("e_contact");
            $table->string("e_position");
            $table->string("e_course");
            $table->boolean("e_status")->default(1);
            $table->longText("e_attachment");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
