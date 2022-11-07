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
        Schema::create('paykeys', function (Blueprint $table) {
            $table->id();
            $table->text('paystack_test_secret_key');
            $table->text('paystack_test_public_key');
            $table->text('paystack_live_secret_key');
            $table->text('paystack_live_public_key');

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
        Schema::dropIfExists('paykeys');
    }
};
