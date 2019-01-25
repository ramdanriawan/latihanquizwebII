<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
	public function daftar()
	{
    	return view('member.create');
	}

	public function simpanDaftar(Request $request)
	{
		$this->validate($request, [
			'nama' => 'required|max:50',
			'email' => 'required|unique:members,email|email',
			'password'  => 'required|confirmed|max:50',
			'password_confirmation'  => 'required'
    	]);
        
		Member::create([
			'nama' => $request->nama,
			'email' => $request->email,
			'password' => $request->password,
		])->save();
		   
    	return redirect('member/login')->with('success', 'Berhasil meregistrasi. Silakan login!');
	}

	public function login()
	{
		if ( auth()->guard('member2')->check() )
			return redirect('member/beranda');

		return view('member.login');
	}

	public function prosesLogin(Request $request)
	{
		// $member = Member::where('email', $request->email)->first();

		// if ( !Hash::check($request->password, $member->password) )
		// return back()->with('error', 'Credentials invalid!');

		// return 'berhasil login';
		// 
		
		$this->validate($request, [
			'email' => 'required|email|max:50',
			'password' => 'required|min:3'
		]);


		$login = [
			'email' => $request->email,
			'password' => $request->password
		];

		if ( Auth()->guard('member')->attempt($login) )
			return redirect('member/beranda');

		return redirect('member/login')->with('error', 'Credentials invalid!');
	}

	public function beranda()
	{
		return view('member.index');
	}

	public function produk()
	{
		return redirect('/');
	}

}