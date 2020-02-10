<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebScrapedPokemons extends Model
{
    protected $guarded = [];

    protected $table = 'web_scraped_pokemons';
}
