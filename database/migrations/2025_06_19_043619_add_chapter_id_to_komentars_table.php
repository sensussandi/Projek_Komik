<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChapterIdToKomentarsTable extends Migration
{
    public function up()
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->dropForeign(['chapter_id']);
            $table->dropColumn('chapter_id');
        });
    }
}
