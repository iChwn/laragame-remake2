<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Berita;
use App\Categori;
use App\Vidios;
use Laratrust\LaratrustFacade as Laratrust;
use Illuminate\Support\Str;
use DB;
use Intervention\Image\ImageManager;
use Image;
use Alaouy\Youtube\Facades\Youtube;
 require '../../../vendor/autoload.php';

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $berita0 = Berita::orderBy('created_at','desc')->take(2)->get();
         $berita1 = Berita::orderBy('created_at','desc')->take(3)->get();
         $berita11 = Berita::orderBy('created_at','asc')->take(3)->get();
         $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
         $beritas = Berita::orderBy('created_at','desc')->paginate(5);
         $berita3 = Berita::orderBy('created_at','asc')->take(4)->get();
         $populer =  Berita::orderBy('views','desc')->take(5)->get();
         $berita  = Berita::all();
         $vidios = DB::table('vidios')->join('beritas','beritas.id','=','vidios.berita_id')->select('vidios.judul','vidios.link','vidios.link_id','vidios.berita_id','vidios.cover','beritas.judul as judulberita','beritas.status')->get();
         $vidiosa  = Vidios::orderBy('created_at','desc')->take(6)->get();
         $categori= Categori::all();
 
       // $data = DB::table('categoris')->join('beritas','categoris.id','=','beritas.categori_id')->select('beritas.judul','categoris.categori')->where('categoris.categori','=','rpg')->get();
       //  return $data;
         return view('frontend.index')->with(compact('beritas','categori','berita1','berita2','berita','vidios','berita0','populer','berita3','img','berita11'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
        $berita = Berita::where('judul_slug', $slug)->first();
        $id=$berita->id;
        $vidio = Vidios::where('berita_id',$id)->first();
        $views = $berita->views + 1;
        $berita->views = $views;
        $berita->save();
        $realeted = Berita::orderBy('created_at','asc')->paginate(4);
        $berita1 = Berita::where('id', $id)->first();
        $categori = Categori::all();
         //return $video;
        return view('frontend.show')->with(compact('berita','categori','berita1','realeted','berita2','vidio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function vidiosg()
    {
        $berita2    = Berita::orderBy('created_at','asc')->take(4)->get();
        $vidio1     = Vidios::orderBy('created_at','desc')->take(1)->get();
        $vidio2     = Vidios::orderBy('created_at','asc')->paginate(8);
        $vidio      = Vidios::all();
        $categori   = Categori::all();
        return view('frontend.hahaha')->with(compact('categori','berita2','vidio','vidio1','vidio2'));
    }

    public function vidios($judul)
    {
         $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
         $vidio = Vidios::where('judul', $judul)->first();
         $vidios  = Vidios::orderBy('created_at','asc')->take(4)->get();
         $categori = Categori::all();
        return view('frontend.vidios-view')->with(compact('categori','berita2','vidio','vidios'));
    }

    public function search(Request $request)
    {
      $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
      $Search=$request->search_code;
      $berita= DB::table('beritas')->where('judul','like',"%$Search%")->paginate(6);
      $categori = Categori::all();
      return view('frontend.search',compact('berita','categori','berita2'));
    }

    public function blog()
    {
        $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
        $categori = Categori::all();
        $berita   = Berita::orderBy('created_at','desc')->paginate(9);
        return view('frontend.blog')->with(compact('categori','berita','berita2'));
    }

    public function portfolio()
    {
        $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
        $categori = Categori::all();
        $berita   = Berita::all();
        return view('frontend.portfolio')->with(compact('categori','berita','berita2'));
    }

//Show Per Kategori
    public function showperkategori($categori)
    {
         $berita = Categori::where('categori', $categori)->first();
         $id=$berita->id;
         $berita0 = Berita::orderBy('created_at','desc')->take(1)->get();
         $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
         $filtercategori = Berita::where('categori_id','=',$id)->paginate(5);
         $berita = Berita::orderBy('created_at','desc')->take(3)->get();
         $beritas = Berita::orderBy('created_at','desc')->paginate(5);
         $populer =  Berita::orderBy('views','desc')->take(5)->get();
         $categori = Categori::all();
        
        return view('frontend.categori',compact('beritas','categori','berita','filtercategori','berita2','populer','berita0'));
    }
    public function showpertag($name)
    {
         $berita0 = Berita::orderBy('created_at','desc')->take(1)->get();
         $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
         $filtercategori = Berita::where('judul','like',"%$name%")->paginate(5);
         $berita = Berita::orderBy('created_at','desc')->take(3)->get();
         $beritas = Berita::orderBy('created_at','desc')->paginate(5);
         $populer =  Berita::orderBy('views','desc')->take(5)->get();
         $categori = Categori::all();
        
        return view('frontend.showpertag',compact('beritas','categori','berita','filtercategori','berita2','populer','berita0'));
    }
    public function showpergaleri($categori)
    {    $tampung = Categori::where('categori', $categori)->first();
         $id=$tampung->id;
         $berita0 = Berita::orderBy('created_at','desc')->take(1)->get();
         $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
         $filtercategori = Berita::where('categori_id','=',$id)->paginate(5);
         $berita = Berita::orderBy('created_at','desc')->take(3)->get();
         $beritas = Berita::orderBy('created_at','desc')->paginate(5);
         $populer =  Berita::orderBy('views','desc')->take(5)->get();
         $categori = Categori::all();
        
        return view('frontend.show-per-portfolio',compact('beritas','categori','berita','filtercategori','berita2','populer','berita0'));
    }
//End

    public function login()
    {
         $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
         $categori = Categori::all();
        return view('auth.login')->with(compact('categori','berita2'));
    }
    public function errors()
    {
         $berita2 = Berita::orderBy('created_at','asc')->take(4)->get();
         $categori = Categori::all();
        return view('errors.404')->with(compact('categori','berita2'));
    }
}
