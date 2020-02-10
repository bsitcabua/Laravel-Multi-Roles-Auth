<?php

namespace App\Http\Controllers;

use App\WebScrapedPokemons;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WebScrapedPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * View by admin
     */
    public function admin()
    {
        //
    }

    // View by user
    public function user()
    {
        try {

            $search = strip_tags(request()->input('search'));
            $search = preg_replace('/\s+/', ' ', $search); // Remove double space
            // Get all contacts based on user id
            $pokemons = User::find(Auth::user()->id)->pokemons();

            // If search not null do search
            if($search){
                $pokemons = $this->searcPokemons($pokemons, $search);
            }

            $pokemons = $pokemons->paginate(20);
            
            return view('web-scraped.pokemon', compact('pokemons'));

        } catch (\Throwable $e) {
            throw $e;
        }

    }

    public function searcPokemons($model, $search)
    {
        $result = $model->where(function($query) use($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('types', 'LIKE', '%' . $search . '%')
                        ->orWhere('no', 'LIKE', '%' . $search . '%');
        });

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scraping()
    {

        try {
            
            $result = array();
            $base_uri = 'https://pokemondb.net';

            $crawler = \Goutte::request('GET', $base_uri.'/pokedex/national');
            // dd($crawler);
            $crawler->filter('.infocard ')->each(function ($node) use(&$result, $base_uri) {
                
                $title = $node->filter('span.infocard-lg-data > a.ent-name')->text();
                $link = $base_uri . $node->filter('span.infocard-lg-img > a')->attr('href');
                $no = $node->filter('span.infocard-lg-data > small')->text();
                $img = $node->filter('span.infocard-lg-img > a > span')->attr('data-src');

                $type1 = $node->filter('span.infocard-lg-data > small > a:nth-child(1)')->text();
                $typeLink1 = $base_uri . $node->filter('span.infocard-lg-data > small > a:nth-child(1)')->attr('href');

                // Check if exist
                if($node->filter('span.infocard-lg-data > small > a:nth-child(2)')->count() > 0){
                    $type2 =  "," . $node->filter('span.infocard-lg-data > small > a:nth-child(2)')->text();
                    $typeLink2 = "," . $base_uri . $node->filter('span.infocard-lg-data > small > a:nth-child(2)')->attr('href');
                }
                else{
                    $type2 = null;
                    $typeLink2 = null;
                }

                $types = $type1.$type2;
                $types_href = $typeLink1.$typeLink2;

                $result = array(
                    'title' => $title,
                    'link' => $link,
                    'no' => $no,
                    'img' => $img,
                    'types' => $types,
                    'types_href' => $types_href,
                    'user_id' => Auth::user()->id,
                );

                $pokemon = new WebScrapedPokemons($result);

                $pokemon->save();

            });

            if (count($result) > 0){
                // return response()->json(array('status' => true, 'message' => 'Pokemon successfully scraped.'));
                return back()->with('msg', 'Pokemon successfully scraped.');
            }
            // return response()->json(array('status' => false, 'message' => 'Pokemon couldn\'t scrap.'));
            return back()->withErrors([ 'error_msg' => 'Failed to scrap pokemons.']);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\web_scraped_pokemons  $web_scraped_pokemons
     * @return \Illuminate\Http\Response
     */
    public function show(web_scraped_pokemons $web_scraped_pokemons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\web_scraped_pokemons  $web_scraped_pokemons
     * @return \Illuminate\Http\Response
     */
    public function edit(web_scraped_pokemons $web_scraped_pokemons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\web_scraped_pokemons  $web_scraped_pokemons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, web_scraped_pokemons $web_scraped_pokemons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\web_scraped_pokemons  $web_scraped_pokemons
     * @return \Illuminate\Http\Response
     */
    public function destroy(web_scraped_pokemons $web_scraped_pokemons)
    {
        //
    }
}
