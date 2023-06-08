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
        Schema::table('paykeys', function (Blueprint $table) {
            $table->string('naira_monthly_price')->nullable();
            $table->string('usd_monthly_price')->nullable();
            $table->string('naira_yearly_price')->nullable();
            $table->string('usd_yearly_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paykeys', function (Blueprint $table) {
            //
        });
    }
};
