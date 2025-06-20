<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->text('isi');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->foreignId('komik_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('chapter_id')->constrained('chapters')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
