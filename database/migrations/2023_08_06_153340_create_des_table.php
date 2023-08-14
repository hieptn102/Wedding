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
        Schema::create('des', function (Blueprint $table) {
            $table->id();
            $table->string('time')->nullable();
            $table->string('name_male')->nullable();
            $table->string('male_image')->nullable();
            $table->string('male_des')->nullable();
            $table->string('name_female')->nullable();
            $table->string('female_image')->nullable();
            $table->string('female_des')->nullable();
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
        Schema::dropIfExists('des');
    }
};
