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

Route::get('subnets', 'NetworkController@subnetsTable');

Route::post('subnets', 'NetworkController@subnetsTable');

Route::get('equipment', 'EquipmentController@equipmentCharts');

Route::post('equipment', 'EquipmentController@equipmentCharts');