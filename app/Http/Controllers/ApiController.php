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
    $tampung= Berita::with('categori')->get();
    $categori = Categori::all();
    $populer =  Berita::with('categori')->orderBy('views','desc')->take(3)->get();
    foreach ($tampung as $key => $value) {
        $data[$key] =[
        'ganteng' =>substr($value->deskripsi,0,300)."..."
        ];
    }


    $semua = [
    'ya' => $data,
    'semua' => $tampung,
    'cat' => $categori,
    'popular' => $populer
    ];
    return $semua;

}
public function detail($judul_slug)
{   
    return Berita::with('categori')->where('judul_slug',$judul_slug)->get();
}
public function showcategori($id)
{   
    $categoriall = Categori::all();
    $categori = Categori::with('berita')->where('id',$id)->get();
    $berita = Berita::with('categori')->where('categori_id',$id)->get();
    foreach ($berita as $key => $value) {
        $data[$key] =[
        'ganteng' =>substr($value->deskripsi,0,300)."..."
        ];
    }
    $semua = [
    'cat' => $categoriall,
    'categori' => $categori,
    'berita' => $berita,
    'ya'       => $data
    ];
    return $semua;
}
}
