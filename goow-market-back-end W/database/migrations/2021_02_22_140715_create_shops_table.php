<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('postal_code');
            $table->string('image');
            $table->string('description');
            $table->time('time_open')->default(Carbon::parse('10:00'));
            $table->time('time_close')->default(Carbon::parse('23:00'));
            $table->string('latitude');
            $table->string('longitude');
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
