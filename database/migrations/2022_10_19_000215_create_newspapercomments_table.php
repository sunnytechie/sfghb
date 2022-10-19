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
        Schema::create('newspapercomments', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->text('comment');
            $table->text('newspaper_id');
            $table->text('newspaper_title');
            $table->string('published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newspapercomments');
    }
};
