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
        Schema::table('komik', function (Blueprint $table) {
            $table->timestamps(); // ini menambah created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::table('komik', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
