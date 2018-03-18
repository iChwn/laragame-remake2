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
    public function showcategoris($id)
    {
        $categoris = Categori::find($id);
        if(is_null($categoris))
        {
           return response()->json("not found",404);
        }

       return response()->json($categoris,200);
    }
    
    public function videos(Vidios $video)
    {
    	$video 		= $video->all();
    	return response()->json($video);
    }
    public function showvideoss($id)
    {
        $videos = Vidios::find($id);
        if(is_null($videos))
        {
           return response()->json("not found",404);
        }

       return response()->json($videos,200);
    }

    public function listdata()
    {
        return Berita::with('categori')->get();
    }
}
