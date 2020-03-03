<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Shared pages
// Unprotected routes
Route::get('/register', 'UserRegistrationController@index')->name('register');
Route::post('/register', 'UserRegistrationController@store')->name('register.store');
Route::get('/login', 'UserSessionController@index')->name('login');
Route::post('/login', 'UserSessionController@store')->name('login.store');
Route::get('/logout','UserSessionController@logout')->name('logout');


// User routes'
Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout','UserSessionController@logout')->name('logout');

    Route::get('/', 'User\ContactController@index');

    Route::resource('/contacts', 'User\ContactController');
    Route::get('/contacts-export', 'User\ContactController@export')->name('export.contacts');

    Route::resource('/profile', 'User\ProfileController');

    Route::get('/pokemons', 'WebScrapedPokemonController@user');

    Route::get('/scraping-pokemons', 'WebScrapedPokemonController@scraping')->name('scrap.pokemons');

    // Livewire
    Route::get('/livewire-counter', function(){
        return view('counter');
    });

});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('/contacts', 'Admin\ContactController');
    Route::resource('/profile', 'Admin\ProfileController');

    Route::get('/pokemons', 'WebScrapedPokemonController@admin');
});
