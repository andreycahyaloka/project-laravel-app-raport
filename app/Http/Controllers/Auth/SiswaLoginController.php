<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class SiswaLoginController extends Controller
{
    //
	public function __construct() {
		$this->middleware('guest:siswa', ['except' => ['logout']]);
	}

	public function showLoginForm() {
		return view('auth.siswalogin');
	}

	public function login(Request $request) {
		$this->validate($request, [
			'nis' => 'required|numeric|digits:12',
			'password' => 'required|string|min:6|max:100',
		]);

		if (Auth::guard('siswa')->attempt(['nis' => $request->nis, 'password' => $request->password], $request->remember)) {
			return redirect()->intended(route('siswauser.index'));
		}

		return redirect()->back()->withInput($request->only('nis', 'remember'));
	}

	public function logout() {
		Auth::guard('siswa')->logout();
		return redirect('/');
	}
}
