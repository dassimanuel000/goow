<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantWorkingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_working_times', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('hours_start')->nullable();
            $table->time('hours_end')->nullable();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('merchant_working_times');
    }
}
