<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Alert;
use App\Vidios;
use App\Categori;

class VidiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Builder $htmlBuilder)
    {
        //
    if ($request->ajax()) {
            $vidios = Vidios::with('berita','categori');
            return Datatables::of($vidios)
            ->addColumn('cover', function($vidios){
                return '<img src="/latihan/public/img/youtube/'.$vidios->cover. '" height="100px" width="200px">';
            })
            ->addColumn('spoiler', function($vidios){
              return '<a href="'.route('vidios.show',$vidios->id).'">'.$vidios->judul.'</a>';
            })
            ->addColumn('action', function($vidios){
            return view('datatable._action',[
                'model'     => $vidios,
                'form_url'  => route('vidios.destroy', $vidios->id),
                'edit_url' => route('vidios.edit', $vidios->id),
                'confirm_message'=>'Yakin mau menghapus : '.$vidios->judul.' ?'
            
            ]);
        })->make(true);
    }
    $html = $htmlBuilder
            ->addColumn(['data'=>'cover','name'=>'cover','title'=>'Cover'])
            ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul'])
            ->addColumn(['data'=>'link','name'=>'link','title'=>'Link'])
            // ->addColumn(['data'=>'link_id','name'=>'link_id','title'=>'Link ID'])
           // ->addColumn(['data'=>'deskripsi','name'=>'deskripsi','title'=>'Deskripsi'])
            // ->addColumn(['data'=>'categori.categori','name'=>'categori.categori','title'=>'Categori'])
            ->addColumn(['data'=>'berita.judul','name'=>'berita.judul','title'=>'Berita'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                'searchable'=>false]);
        return view('backend/vidios.index')->with(compact('html','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/vidios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tambah = new Vidios();
        $tambah->judul = $request->get('judul');
        //Judul kita jadikan slug
        $tambah->berita_id = $request->get('berita_id');
        $tambah->categori_id = $request->get('categori_id');
        $tambah->link = $request->get('link');
        $tambah->link_id = $request->get('link_id');
        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('cover');
        $fileName   = $file->getClientOriginalName('');
        $request->file('cover')->move("img/youtube/", $fileName);

        $tambah->cover = $fileName;
        $tambah->save();
        alert()->success($tambah->judul, 'Berhasil Menyimpan')->persistent('Close');
        return redirect()->route('vidios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vidios = Vidios::find($id);
        return view('backend/vidios.edit')->with(compact('vidios'));
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
        $vidios = Vidios::find($id);
        $cover =$vidios->cover;
        if (!$vidios->delete()) return redirect()->back();
        //hapus cover lama, jika ada
        if($cover)
        {
            $old_cover = $vidios->cover;
            $filepath = public_path().DIRECTORY_SEPARATOR.'img/youtube'.DIRECTORY_SEPARATOR.$vidios->cover;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                //file sudah dihapuys tidak ada
            }
        }


       alert()->success($vidios->judul, 'Berhasil Menghapus')->persistent('Close');
        return redirect()->route('vidios.index');
    }
}
