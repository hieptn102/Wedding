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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('main_start_time')->nullable();
            $table->string('main_end_time')->nullable();
            $table->string('main_day_date')->nullable();
            $table->string('main_month_year')->nullable();
            $table->string('party_start_time')->nullable();
            $table->string('party_end_time')->nullable();
            $table->string('party_day_date')->nullable();
            $table->string('party_month_year')->nullable();
            $table->string('backgroud')->nullable();
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
        Schema::dropIfExists('events');
    }
};
