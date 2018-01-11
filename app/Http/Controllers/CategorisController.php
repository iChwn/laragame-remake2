<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categori;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Alert;

class CategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $categoris = Categori::select(['id', 'categori']);
            return Datatables::of($categoris)
            ->addColumn('edit', function($categori){
                return view('datatable.edit_categori',[
                    'model'   =>$categori,
                    ]);
            })
            ->addColumn('action', function($categori){
                return view('datatable.delete_categori', [
                    'model'   => $categori,
                    'form_url'=>route('categoris.destroy',$categori->id), 
                    'confirm_message' => 'Yakin mau menghapus ' . $categori->categori . '?'
                    ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'categori', 'name'=>'categori', 'title'=>'Categori'])
        ->addColumn(['data' => 'edit', 'name'=>'edit', 'title'=>'', 'orderable'=>false, 'searchable'=>false])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('backend/categoris.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/categoris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['categori'=>'required|unique:categoris']);
        $categori = Categori::create($request->all());
        alert()->success('Berhasil Disimpan', $categori->categori);
        if( $categori == null){
            Alert::error('Tidak bisa menghapus kategori karna masih memiliki berita ','Gagal !!')->persistent('Close');
        }
        return redirect('admin/categoris');
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
        $categori = Categori::find($id);
        return view('backend/categoris.edit')->with(compact('categori'));
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
        $this->validate($request, ['categori' => 'required|unique:categoris,categori,'. $id]);
        $categori = Categori::find($id);
        $categori->update($request->only('categori'));
        alert()->success('Berhasil Disimpan', $categori->categori);
        return redirect()->route('categoris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Categori::destroy($id)) return redirect()->back();
        Alert::success('Telah Berhasil Menghapus Category ','Sipp !!')->persistent('Close');
        return redirect()->route('categoris.index');
    }
}
