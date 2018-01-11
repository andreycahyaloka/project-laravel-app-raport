<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class GuruLoginController extends Controller
{
    //
	public function __construct() {
		$this->middleware('guest:guru', ['except' => ['logout']]);
	}

	public function showLoginForm() {
		return view('auth.gurulogin');
	}

	public function login(Request $request) {
		$this->validate($request, [
			'nip' => 'required|numeric|digits:12',
			'password' => 'required|string|min:6|max:100',
		]);

		if (Auth::guard('guru')->attempt(['nip' => $request->nip, 'password' => $request->password], $request->remember)) {
			return redirect()->intended(route('guruuser.index'));
		}

		return redirect()->back()->withInput($request->only('nip', 'remember'));
	}

	public function logout() {
		Auth::guard('guru')->logout();
		return redirect('/');
	}
}
