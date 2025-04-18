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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string("section");
            $table->string("img_path");
            $table->boolean("status")->default(1);
            $table->timestamps();
        });

        Schema::table('contents',function (Blueprint $table){
            $table->unsignedBigInteger('section_id')->after('id');
            $table->foreign("section_id")->references("id")->on('sections')->onDelete("cascade");
        });

        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('sections');
    }
};
