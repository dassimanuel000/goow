<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketWorkingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_working_times', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('hours_start')->nullable();
            $table->time('hours_end')->nullable();
            $table->unsignedBigInteger('market_id')->nullable();
            $table->timestamps();

            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_working_times');
    }
}
