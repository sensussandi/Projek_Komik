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
        Schema::table('chapter',function (Blueprint $table){
            $table->dropForeign('fk_chapter_komik');
            $table->unsignedBigInteger('komik_id')->change();
            $table->foreign('komik_id')
                  ->references('id')->on('komik')
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('chapter', function (Blueprint $table){
            $table->dropForeign(['komik_id']);

        });
    }
};
