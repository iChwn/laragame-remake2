<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Vidios;
use App\Categori;
use App\Role;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UpdateMemberRequest;

class AcceptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Builder $htmlBuilder)
    {
        if ($request->ajax()) {
        $beritas = Berita::with('categori');
        return Datatables::of($beritas)
        ->addColumn('cover', function($beritas){
            if(isset($beritas->cover)){
                return '<img src="../../public/img/'.$beritas->cover. '" height="100px" width="200px">';
            }else{
                return "Tidak Ada Gambar";
            }
        })
        ->addColumn('read', function($beritas){
            return view('datatable.show',[
                'model'   =>$beritas
                ]);
        })
        ->addColumn('accept',function($beritas){
            if ($beritas->status<=0) {
                return view('datatable.status',[
                'model' =>$beritas,
                'form_url'=>route('beritaas.destroy',$beritas->id)
                ]);
            }
            elseif ($beritas->status>=0) {
                return view('datatable.status2',[
                'model' =>$beritas,
                'form_url'=>route('beritaas.edit',$beritas->id)
                ]);
            }
        })->make(true);
    }
    $html = $htmlBuilder
    ->addColumn(['data'=>'cover','name'=>'cover','title'=>'Cover'])
    ->addColumn(['data'=>'authors','name'=>'authors','title'=>'Authors'])
    ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul'])
    ->addColumn(['data'=>'categori.categori','name'=>'categori.categori','title'=>'Categori'])
    ->addColumn(['data'=>'read','name'=>'read','title'=>'Show','orderable'=>false,
        'searchable'=>false])
    ->addColumn(['data'=>'accept', 'name'=>'accept', 'title'=>'', 'orderable'=>false,
        'searchable'=>false]);
    return view('backend/beritas.beritasuper')->with(compact('html','kategori'));
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
        $berita = Berita::find($id);
        $id=$berita->id;
        $status = $berita->status - 1;
        $berita->status = $status;
        $berita->save();
        alert()->success($berita->judul, 'Berhasil Di Un Acc')->persistent('Close');
        return redirect()->route('beritaas.index');
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
        $id=$berita->id;
        $status = $berita->status + 1;
        $berita->status = $status;
        $berita->save();
        alert()->success($berita->judul, 'Berhasil Di Acc')->persistent('Close');
        return redirect()->route('beritaas.index');
    }
}
