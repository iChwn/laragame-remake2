<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
	public function profile()
	{
		return view('backend/admins.profile');
	}

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function editProfile()
	{
		return view('backend/admins.edit-profile');
	}
	public function updateProfile(Request $request)
	{
		$user = Auth::user();
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|unique:users,email,' . $user->id
			]);
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->save();
		alert()->info($user->name, 'Berhasil Mengedit')->persistent('Close');
		return redirect('settings/profile');
	}

	//Pasworld
	public function editPassword()
	{
		return view('backend/admins.edit-password');
	}

	public function updatePassword(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password' => 'required|passcheck:'.$user->password,
    		'new_password' => 'required|confirmed|min:6',
    		],[
    		'password.passcheck' => 'Password lama tidak sesuai'
    		]);
    	$user->password = bcrypt($request->get('new_password'));
    	$user->save();

    	alert()->info($user->name, 'Berhasil Mengedit')->persistent('Close');
    	return redirect('settings/password');
    }
}
