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




Auth::routes(["verify"=>true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware("verified");


Route::get("/offers","OffersController@getFillable");


Route::group(["prefix"=>"test"],function(){
    Route::get("/insert","OffersController@store");
});



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::group(["prefix"=>"offer"],function(){
        Route::get("/create","OffersController@create");
        Route::post("/store","OffersController@store")->name("offer.store");
        Route::get("/all","OffersController@allOffers")->name("all");
    });
});


