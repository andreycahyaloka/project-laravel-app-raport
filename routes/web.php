<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
	return view('/guests/index');
})->name('guest.index');

Route::get('/about', function() {
	return view('/guests/about');
})->name('guest.about');

Route::get('/contact', function() {
	return view('/guests/contact');
})->name('guest.contact');

// home
Route::get('/home', function() {
	if (Auth::guard()) { // if (Auth::user()) {
		if (Auth::guard('admin')->check()) {
			return redirect('/admin');
		}
		elseif (Auth::guard('guru')->check()) {
			return redirect('/guru');
		}
		elseif (Auth::guard('siswa')->check()) {
			return redirect('/siswa');
		}
		else {
			// invalid user
			return redirect('/');
		}
	}
	else {
		// unregistered user / not login
		return redirect('/');
	}
});

// admin
Route::group(['prefix' => 'admin'], function() {
	// Admin Authentication Routes...
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	// Admin Password Reset Routes...
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');

	Route::group(['middleware' => ['auth:admin']], function() {
		Route::get('/', 'AdminController@index')->name('admin.index');

		// siswa controller
		Route::group(['prefix' => 'data-siswa'], function() {
			// index
			Route::get('/', 'SiswaController@index')->name('siswa.index');

			// create
			Route::get('/create', 'SiswaController@create')->name('siswa.create');
			// store
			Route::post('/', 'SiswaController@store')->name('siswa.store');

			// show
			Route::get('/{nis}', ['as' => 'siswa.show', 'uses' => 'SiswaController@show'])
				->where('nis', '[\d]+');

			// edit
			Route::get('/{nis}/edit', ['as' => 'siswa.edit', 'uses' => 'SiswaController@edit'])
				->where('nis', '[\d]+');
			// update
			Route::put('/{id}', 'SiswaController@update')->name('siswa.update');

			// delete
			Route::delete('/{id}', 'SiswaController@destroy')->name('siswa.destroy');
		});

		// jurusan controller
		Route::group(['prefix' => 'data-jurusan'], function() {
			Route::get('/', 'JurusanController@index')->name('jurusan.index');

			Route::post('/', 'JurusanController@store')->name('jurusan.store');

			Route::get('/{id}/edit', ['as' => 'jurusan.edit', 'uses' => 'JurusanController@edit'])
				->where('id', '[\d]+');
			Route::put('/{id}', 'JurusanController@update')->name('jurusan.update');

			Route::delete('/{id}', 'JurusanController@destroy')->name('jurusan.destroy');
		});

		// guru controller
		Route::group(['prefix' => 'data-guru'], function() {
			Route::get('/', 'GuruController@index')->name('guru.index');

			Route::get('/create', 'GuruController@create')->name('guru.create');
			Route::post('/', 'GuruController@store')->name('guru.store');

			Route::get('/{nip}', ['as' => 'guru.show', 'uses' => 'GuruController@show'])
				->where('nip', '[\d]+');

			Route::get('/{nip}/edit', ['as' => 'guru.edit', 'uses' => 'GuruController@edit'])
				->where('nip', '[\d]+');
			Route::put('/{id}', 'GuruController@update')->name('guru.update');

			Route::delete('/{id}', 'GuruController@destroy')->name('guru.destroy');
		});

		// nilai controller
		Route::group(['prefix' => 'data-nilai'], function() {
			Route::get('/', 'NilaiController@index')->name('nilai.index');

			Route::get('/print/{id}', 'NilaiController@print')->name('nilai.print');

			Route::get('/create', 'NilaiController@create')->name('nilai.create');
			Route::post('/', 'NilaiController@store')->name('nilai.store');

			Route::get('/{kodenilai}', ['as' => 'nilai.show', 'uses' => 'NilaiController@show'])
				->where('kodenilai', '[\w\d]+');

			Route::get('/{kodenilai}/edit', ['as' => 'nilai.edit', 'uses' => 'NilaiController@edit'])
				->where('kodenilai', '[\w\d]+');
			Route::put('/{id}', 'NilaiController@update')->name('nilai.update');

			Route::delete('/{id}', 'NilaiController@destroy')->name('nilai.destroy');
		});

		// detailnilai controller
		Route::group(['prefix' => 'data-detailnilai'], function() {
			Route::get('/', 'DetailnilaiController@index')->name('detailnilai.index');

			Route::get('/create', 'DetailnilaiController@create')->name('detailnilai.create');
			Route::post('/', 'DetailnilaiController@store')->name('detailnilai.store');

			Route::get('/{id}', 'DetailnilaiController@show')->name('detailnilai.show');

			Route::get('/{id}/edit', 'DetailnilaiController@edit')->name('detailnilai.edit');
			Route::put('/{id}', 'DetailnilaiController@update')->name('detailnilai.update');

			Route::delete('/{id}', 'DetailnilaiController@destroy')->name('detailnilai.destroy');
		});
	});
});

// guru
Route::group(['prefix' => 'guru'], function() {
	// Guru Authentication Routes...
	Route::get('/login', 'Auth\GuruLoginController@showLoginForm')->name('guru.login');
	Route::post('/login', 'Auth\GuruLoginController@login')->name('guru.login.submit');
	Route::post('/logout', 'Auth\GuruLoginController@logout')->name('guru.logout');

	// Guru Password Reset Routes...
	Route::get('/password/reset', 'Auth\GuruForgotPasswordController@showLinkRequestForm')->name('guru.password.request');
	Route::post('/password/email', 'Auth\GuruForgotPasswordController@sendResetLinkEmail')->name('guru.password.email');
	Route::get('/password/reset/{token}', 'Auth\GuruResetPasswordController@showResetForm')->name('guru.password.reset');
	Route::post('/password/reset', 'Auth\GuruResetPasswordController@reset');

	Route::group(['middleware' => ['auth:guru']], function() {
		Route::get('/', 'GuruuserController@index')->name('guruuser.index');

		Route::get('/{kodenilai}', ['as' => 'guruuser.indexdetail', 'uses' => 'GuruuserController@indexdetail'])
		->where('kodenilai', '[\w\d]+');

		Route::get('/{id}/edit', 'GuruuserController@editsiswa')->name('guruuser.editsiswa');
		Route::put('/{id}', 'GuruuserController@updatesiswa')->name('guruuser.updatesiswa');
	});
});

// siswa
Route::group(['prefix' => 'siswa'], function() {
	// Siswa Authentication Routes...
	Route::get('/login', 'Auth\SiswaLoginController@showLoginForm')->name('siswa.login');
	Route::post('/login', 'Auth\SiswaLoginController@login')->name('siswa.login.submit');
	Route::post('/logout', 'Auth\SiswaLoginController@logout')->name('siswa.logout');

	// Siswa Password Reset Routes...
	Route::get('/password/reset', 'Auth\SiswaForgotPasswordController@showLinkRequestForm')->name('siswa.password.request');
	Route::post('/password/email', 'Auth\SiswaForgotPasswordController@sendResetLinkEmail')->name('siswa.password.email');
	Route::get('/password/reset/{token}', 'Auth\SiswaResetPasswordController@showResetForm')->name('siswa.password.reset');
	Route::post('/password/reset', 'Auth\SiswaResetPasswordController@reset');

	Route::group(['middleware' => ['auth:siswa']], function() {
		Route::get('/', 'SiswauserController@index')->name('siswauser.index');
	});
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
