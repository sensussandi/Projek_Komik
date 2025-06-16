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
    Schema::create('komik', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('genre');
        $table->string('penulis');
        $table->text('sinopsis');
        $table->string('cover')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komik');
    }
};
