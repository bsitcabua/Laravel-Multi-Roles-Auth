<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebScrapedPokemons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_scraped_pokemons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->string('link', 255);
            $table->string('types', 255);
            $table->string('types_href', 255);
            $table->string('no', 255);
            $table->string('img', 255);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('web_scraped_pokemons');
    }
}
