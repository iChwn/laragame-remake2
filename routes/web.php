<?php

Auth::routes();

Route::get('/home', 'HomeController@index');

//Guest
Route::get('/', 'GuestController@index');
Route::get('/login', 'GuestController@errors');
Route::get('/register', 'GuestController@errors');
Route::get('/admin-l', 'GuestController@login');
Route::resource('/show','GuestController');
Route::get('/vidios/{judul}', array('as' => 'vidios', 'uses' =>'GuestController@vidios'));
Route::get('/categori/{id}', array('as' => 'showperkategori', 'uses' =>'GuestController@showperkategori'));
Route::get('/tag/{name}', array('as' => 'showpertag', 'uses' =>'GuestController@showpertag'));
Route::get('/gambar/{id}', array('as' => 'showpergaleri', 'uses' =>'GuestController@showpergaleri'));
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

//Super
Route::group(['middleware' => 'web'], function () {
	Route::group(['prefix'=>'super', 'middleware'=>['auth', 'role:super']], function () {
		Route::resource('pengurus', 'AdminsController');
		Route::resource('beritaas', 'AcceptsController');
		Route::get('settings/profile', 'AdminsController@profile');
	});
});

//Vertivy Token
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
//Setting Admin
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');


Route::get('article', 'ArticleController@index');
Route::post('article', 'ArticleController@store');

//pharsing
Route::group(['middleware'=>'cors'],function(){
	Route::get('/contoh','PharsingController@api');
	Route::get('/contoh2','ApiController@listdata');
});