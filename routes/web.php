<?php

Auth::routes();

Route::get('/home', 'HomeController@index');

//Guest
Route::get('/', 'GuestController@index');
Route::get('/login', 'GuestController@errors');
Route::get('/admin-l', 'GuestController@login');
Route::resource('/show','GuestController');
Route::get('/vidios/{judul}', array('as' => 'vidios', 'uses' =>'GuestController@vidios'));
Route::get('/categori/{id}', array('as' => 'showperkategori', 'uses' =>'GuestController@showperkategori'));
Route::get('/portfolio', 'GuestController@portfolio');
Route::get('/blog', 'GuestController@blog');
Route::post('/search','GuestController@search');
Route::get('/vidiog','GuestController@vidiosg');

//Contact
Route::get('/contact', 'Contact@showContactForm');
Route::post('/contact', 'Contact@sendMail');

//Testing
Route::get('/testing','TestingController@index');

//Admin
Route::group(['middleware' => 'web'], function () {
	Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
		Route::resource('categoris', 'CategorisController');
		Route::resource('beritas', 'BeritasController');
		Route::resource('vidios', 'VidiosController');
		Route::resource('blogs', 'BeritasController@blog');
	});
});
