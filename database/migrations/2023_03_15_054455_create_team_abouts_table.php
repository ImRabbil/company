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
        Schema::create('team_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('designation');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twiter')->nullable();
            $table->string('linkdin')->nullable();

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
        Schema::dropIfExists('team_abouts');
    }
};
