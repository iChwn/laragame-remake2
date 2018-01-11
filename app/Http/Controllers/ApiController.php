<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Categori;
use App\Vidios;

class ApiController extends Controller
{
    //api berita
    public function beritas(Berita $berita)
    {
    	$berita 	= $berita->all();
    	return response()->json($berita);
    }
    public function showberitas($id)
    {
        $beritas = Berita::find($id);
        if(is_null($beritas))
        {
           return response()->json("not found",404);
        }

       return response()->json($beritas,200);
    }


    public function categoris (Categori $categori)
    {
    	$categori 	= $categori->all();
    	return response()->json($categori);
    }
    
    public function videos(Vidios $video)
    {
    	$video 		= $video->all();
    	return response()->json($video);
    }
}
