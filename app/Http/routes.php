<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('subnet', 'SubnetController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('example', function () {
    return view('example');
});

Route::get('subnets', 'PagesController@subnetsTable');

Route::get('subnetsInherits', 'PagesController@subnetsTableInherits');

Route::get('equipment', 'PagesController@equipmentCharts');