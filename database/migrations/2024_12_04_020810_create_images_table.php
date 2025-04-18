<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->string('image_name')->nullable(); // Image descriptive name
        $table->string('image_url');             // Path or URL of the image
        $table->timestamps();                   // Tracks created and updated times
    });
}

public function down()
{
    Schema::dropIfExists('images');
}

};
