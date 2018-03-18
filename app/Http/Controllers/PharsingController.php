<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class PharsingController extends Controller
{
    public function api(){
    	return Berita::all();
    }
}
