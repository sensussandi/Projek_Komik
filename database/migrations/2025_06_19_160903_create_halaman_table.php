<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('halaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->string('image_url');
            $table->integer('urutan');
            $table->timestamps();
            
            // Index untuk performa
            $table->index('chapter_id');
            $table->index('urutan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('halaman');
    }
};