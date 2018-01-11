<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;
use Password;
use Illuminate\Support\Facades\Auth;

class SiswaResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
	protected $redirectTo = '/siswa';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:siswa');
    }

	protected function guard() {
		return Auth::guard('siswa');
	}

	protected function broker() {
		return Password::broker('siswax');
	}

	public function showResetForm(Request $request, $token = null) {
		return view('auth.passwords.siswareset')->with(
			['token' => $token, 'email' => $request->email]
		);
	}
}
