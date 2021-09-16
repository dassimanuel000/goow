<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateWorkingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_times', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('hours_start_first')->nullable();
            $table->time('hours_end_first')->nullable();
            $table->time('hours_start_second')->nullable();
            $table->time('hours_end_second')->nullable();
            $table->boolean('closed')->default(false);
            $table->unsignedBigInteger('market_id')->nullable();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->timestamps();

            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('merchant_id')->references('id')->on('merchants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_times');
    }
}
