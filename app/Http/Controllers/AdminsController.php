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

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Builder $htmlBuilder)
    {
     if ($request->ajax()) {
        $admins = Role::where('name','admin')->first()->users;
        return Datatables::of($admins)
        ->addColumn('edit',function($admin){
            return view ('datatable.edit_berita',[
                'model' => $admin
                ]);
        })
        ->addColumn('hapus',function($admin){
            return view('datatable.delete_admin',[
                'model' =>$admin,
                'form_url'=>route('pengurus.destroy',$admin->id), 
                'confirm_message' => 'Yakin mau menghapus ' . $admin->judul . '?'
                ]);
        })->make(true);
    }

    $html = $htmlBuilder
    ->addColumn(['data'=>'name','name'=>'name','title'=>'Nama'])
    ->addColumn(['data'=>'email','name'=>'email','title'=>'Email'])
    ->addColumn(['data'=>'edit','name'=>'Hapus','title'=>'','orderable'=>false,'searchable'=>false])
    ->addColumn(['data'=>'hapus','name'=>'Hapus','title'=>'','orderable'=>false,'searchable'=>false]);
    return view('backend/admins.index',compact('html'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = str_random(6);
        $data = $request->all();
        $data['password'] = bcrypt($password);
        //bypass vrtifikasi
        $data['is_verified'] = 1;

        $admin = User::create($data);

        //set role
        $adminRole = Role::where('name','admin')->first();
        $admin->attachRole($adminRole);

        //kirim email
        Mail::send('auth.emails.invite',compact('admin','password'),function($m) use ($admin){
            $m->to($admin->email,$admin->name)->subject('Anda telah didaftarkan di Laragame oleh Admin!');
        });
        alert()->success('Berhasil menyiapkan member dengan email dan password ',''.$password.'')->persistent('Close');
        return redirect()->route('pengurus.index');
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
        /* Author::destroy($id); */
        if(!User::destroy($id)) return redirect()->back();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Admin berasil di hapus"
            ]);
        return redirect()->route('pengurus.index');
    }

    public function profile()
    {
        return view('backend/admins.profile');
    }


}
