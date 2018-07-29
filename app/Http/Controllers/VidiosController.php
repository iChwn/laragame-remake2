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
            $vidios = Vidios::with('berita');
            return Datatables::of($vidios)
            ->addColumn('cover', function($vidios){
                return '<img src="../img/youtube/'.$vidios->cover. '" height="100px" width="200px">';
            })
            ->addColumn('spoiler', function($vidios){
              return '<a href="'.route('vidios.show',$vidios->id).'">'.$vidios->judul.'</a>';
            })
            ->addColumn('hapus',function($vidios){
                return view('datatable.delete_video',[
                    'model' =>$vidios,
                    'form_url'=>route('vidios.destroy',$vidios->id), 
                    'confirm_message' => 'Yakin mau menghapus ' . $vidios->judul . '?'
                    ]);
            })
             ->addColumn('hapus2', function($vidios){
                return view('datatable.edit_video',[
                    'model'     => $vidios,
                    'form_url'  => route('vidios.destroy', $vidios->id),
                    'edit_url'  => route('vidios.edit', $vidios->id),
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
            ->addColumn(['data'=>'hapus', 'name'=>'hapus', 'title'=>'', 'orderable'=>false,
            'searchable'=>false])
            ->addColumn(['data'=>'hapus2', 'name'=>'hapus2', 'title'=>'', 'orderable'=>false,
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
        $this->validate($request,[
            'cover'       =>'image|max:5048',
            'judul'       =>'required|unique:vidios',
 ]);        
        $tambah = new Vidios();
        $tambah->judul = $request->get('judul');
        //Judul kita jadikan slug
        $tambah->berita_id = $request->get('berita_id');
       
        $tambah->link = $request->get('link');
        $tambah->link_id = $request->get('link_id');
        $tambah->authors = $request->get('authors');
        $tambah->authors_id = $request->get('authors_id');
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
        $vidio = Vidios::find($id);
        if (!$vidio->update($request->all())) return redirect()->back();

        //isi file cover jika ada cover yang di upload

        if($request->hasFile('cover')) {
            //mengambil cover yang di upload berikut extension
            $filename=null;
            $uploded_cover = $request->file('cover');
            $extension = $uploded_cover->getClientOriginalExtension();
            //membuat nama file random berikut extensi
            $filename=md5(time()) .'.'. $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR .'img/youtube';
            
            //menyimpan cover ke folder public/img
            
            $uploded_cover->move($destinationPath,$filename);

            //hapus cover lama
            if($vidio->cover) {
                $old_cover=$vidio->cover;
                $filepath = public_path() . DIRECTORY_SEPARATOR .'img/youtube/' 
                . DIRECTORY_SEPARATOR .$vidio->cover;

                try{
                   File::delete($filepath);
               }catch (FileNotFoundException $e){
                    //file sudah dihapus/tidak ada
               }
           }
            //ganti field cover dengan cover baru
           $vidio->cover=$filename;
           $vidio->save();

       }

       alert()->info($vidio->judul, 'Berhasil Mengedit')->persistent('Close');
       return redirect()->route('vidios.index');
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
