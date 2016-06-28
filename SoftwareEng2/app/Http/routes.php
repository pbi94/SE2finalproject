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

Route::get('/','HomeController@firstpage'    );
Route::get('/index', 'HomeController@welcome');
Route::get('/login', 'HomeController@login'  );
Route::get('/home', 'HomeController@index'   );
Route::post('/logincheck','HomeController@CheckLogin');
Route::get('/admin', 'HomeController@admin');
Route::get('/admin/addDriver', 'HomeController@addDriver');
Route::post('/admin/addDriver/add', 'HomeController@addnewDriver');


Route::get('/admin/Drivers/view', 'HomeController@viewDriver');
Route::get('/admin/Drivers/view/edit/{id}', 'HomeController@EdidDrivewr');
Route::post('/admin/Drivers/view/edit/{id}/submit', 'HomeController@EdidDrivewrSub');
Route::post('/admin/Drivers/view/del/{user}', 'HomeController@DeleteDrivewrSub');

Route::get('/admin/pop', 'HomeController@pop');

Route::get('/admin/report/{user}', 'HomeController@reportbyuser');
Route::get('/admin/report/{user}/pay/{id}', 'HomeController@paydriver');
