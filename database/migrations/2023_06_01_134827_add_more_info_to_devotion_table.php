<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devotions', function (Blueprint $table) {
            $table->text('anchor_bible_text')->nullable();
            $table->text('anchor_bible_chapter_verse')->nullable();
            $table->text('bible_reading_chapter_verse')->nullable();
            $table->text('prayer')->nullable();
            $table->text('further_reading')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devotions', function (Blueprint $table) {
            //
        });
    }
};
