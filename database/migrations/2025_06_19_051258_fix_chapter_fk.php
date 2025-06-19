<?php

// database/migrations/xxxx_xx_xx_fix_chapter_fk.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('chapter', function (Blueprint $table) {
            // hapus FK lama
            $table->dropForeign('fk_chapter_komik');

            // (opsional) pastikan tipe-nya sama dgn komik.id
            $table->unsignedBigInteger('komik_id')->change();

            // FK baru ke tabel komik
            $table->foreign('komik_id')
                  ->references('id')->on('komik')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('chapter', function (Blueprint $table) {
            $table->dropForeign(['komik_id']);
        });
    }
};
