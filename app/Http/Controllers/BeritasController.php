<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Berita;
use App\Categori;
use Illuminate\Support\Facades\File;
use Alert;
use Illuminate\Support\Str;

class BeritasController extends Controller
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
            $beritas = Berita::with('categori');
            return Datatables::of($beritas)
            ->addColumn('cover', function($beritas){
                if(isset($beritas->cover)){
                    return '<img src="../img/'.$beritas->cover. '" height="100px" width="200px">';
                }else{
                    return "Tidak Ada Gambar";
                }
            })
            ->addColumn('read', function($beritas){
                return view('datatable.show',[
                    'model'   =>$beritas
                    ]);
            })
            ->addColumn('hapus',function($beritas){
                return view('datatable.delete_berita',[
                    'model' =>$beritas,
                    'form_url'=>route('beritas.destroy',$beritas->id), 
                    'confirm_message' => 'Yakin mau menghapus ' . $beritas->judul . '?'
                    ]);
            })
            ->addColumn('edit',function($beritas){
                return view ('datatable.edit_berita',[
                    'model' => $beritas
                ]);
            })
            ->addColumn('action', function($beritas){
                return view('datatable._action',[
                    'model'     => $beritas,
                    'form_url'  => route('beritas.destroy', $beritas->id),
                    'edit_url'  => route('beritas.edit', $beritas->id),
                    'confirm_message'=>'Yakin mau menghapus : '.$beritas->judul.' ?'       
                    ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'cover','name'=>'cover','title'=>'Cover'])
        ->addColumn(['data'=>'authors','name'=>'authors','title'=>'Authors'])
        ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul'])
           // ->addColumn(['data'=>'deskripsi','name'=>'deskripsi','title'=>'Deskripsi'])
        ->addColumn(['data'=>'categori.categori','name'=>'categori.categori','title'=>'Categori'])
        ->addColumn(['data'=>'read','name'=>'read','title'=>'Show','orderable'=>false,
            'searchable'=>false])
        ->addColumn(['data'=>'hapus', 'name'=>'hapus', 'title'=>'', 'orderable'=>false,
            'searchable'=>false])
        // ->addColumn(['data'=>'edit', 'name'=>'edit', 'title'=>'', 'orderable'=>false,
        //     'searchable'=>false])
        ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
            'searchable'=>false]);
        return view('backend/beritas.index')->with(compact('html','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/beritas.create');
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
            'judul'       =>'required|unique:beritas',
            'spoiler'     =>'required',
            'categori_id' =>'required',
            'deskripsi'   =>'required',
            'deskripsi2'  =>'',
            'cover'       =>'required|image|max:5048',
            'tags'        => 'required',
 ]);        

        $tambah = new Berita();
        $tambah->judul = $request->get('judul');
        //Judul kita jadikan slug
        $tambah->judul_slug = Str::slug($request->get('spoiler'));
        $tambah->spoiler = $request->get('spoiler');
        $tambah->categori_id = $request->get('categori_id');
        $tambah->deskripsi = $request->get('deskripsi');
        $tambah->deskripsi2 = $request->get('deskripsi2');
        $tambah->authors = $request->get('authors');
        $tambah->authors_id = $request->get('authors_id');
        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('cover');
        $fileName   = $file->getClientOriginalName('');
        $request->file('cover')->move("img/", $fileName);
        $tambah->cover = $fileName;
        $tambah->save();
    
        $tags = explode(",", $request->tags);
        $tambah->tag($tags);

        alert()->success($tambah->judul, 'Berhasil Menyimpan')->persistent('Close');
        return redirect()->route('beritas.index');
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
        $berita =Berita::find($id);
        return view('backend/beritas.edit')->with(compact('berita'));
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
        $berita = Berita::find($id);
        if (!$berita->update($request->all())) return redirect()->back();

        //isi file cover jika ada cover yang di upload

        if($request->hasFile('cover')) {
            //mengambil cover yang di upload berikut extension
            $filename=null;
            $uploded_cover = $request->file('cover');
            $extension = $uploded_cover->getClientOriginalExtension();
            //membuat nama file random berikut extensi
            $filename=md5(time()) .'.'. $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR .'img';
            
            //menyimpan cover ke folder public/img
            
            $uploded_cover->move($destinationPath,$filename);

            //hapus cover lama
            if($berita->cover) {
                $old_cover=$berita->cover;
                $filepath = public_path() . DIRECTORY_SEPARATOR .'img' 
                . DIRECTORY_SEPARATOR .$berita->cover;

                try{
                   File::delete($filepath);
               }catch (FileNotFoundException $e){
                    //file sudah dihapus/tidak ada
               }
           }
            //ganti field cover dengan cover baru
           $berita->cover=$filename;
           $berita->save();

       }

       alert()->info($berita->judul, 'Berhasil Mengedit')->persistent('Close');
       return redirect()->route('beritas.index');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $cover =$berita->cover;
        if (!$berita->delete()) return redirect()->back();
        //hapus cover lama, jika ada
        if($cover)
        {
            $old_cover = $berita->cover;
            $filepath = public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$berita->cover;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                //file sudah dihapuys tidak ada
            }
        }


        alert()->success($berita->judul, 'Berhasil Menghapus')->persistent('Close');
        return redirect()->route('beritas.index');

    }

    public function blog()
    {
        $categori = Categori::all();
        $berita     = Berita::orderBy('created_at','desc')->paginate(3);
        return view('backend/beritas.blog',with(compact('categori','berita')));
    }

}
