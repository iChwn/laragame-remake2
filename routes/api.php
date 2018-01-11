<?php

use Illuminate\Http\Request;

Route::get('beritas','ApiController@beritas');
Route::get('beritas/{id}','ApiController@showberitas');

Route::get('categoris','ApiController@categoris');
Route::get('videos','ApiController@videos');