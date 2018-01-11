<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Guru;
use App\Jeniskelamin;
use App\Agama;
use App\Jenjangstudi;
use App\Status;
use App\Jabatan;
use Session;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//
		$gurux = Guru::
			orderBy('nip', 'asc')
			->paginate(10);

		return view('/gurux/index')
			->withGurux($gurux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$jeniskelaminx = Jeniskelamin::
			orderBy('nama', 'asc')
			->get();
		
		$agamax = Agama::
			orderBy('nama', 'asc')
			->get();

		$jenjangstudix = Jenjangstudi::
			orderBy('nama', 'asc')
			->get();

		$statusx = Status::
			orderBy('nama', 'asc')
			->get();

		$jabatanx = Jabatan::
			orderBy('nama', 'asc')
			->get();

		return view('/gurux/create')
			->withJeniskelaminx($jeniskelaminx)
			->withAgamax($agamax)
			->withJenjangstudix($jenjangstudix)
			->withStatusx($statusx)
			->withJabatanx($jabatanx);
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
		$this->validate($request, [
			'nip' => 'required|numeric|digits:12|unique:gurux,nip',
			'nama_lengkap' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tempat_lahir' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tgl_lahir' => 'required|date_format:d/m/Y|before:today|after:01/01/1900',
			'alamat' => 'required|regex:/^[a-z0-9\ \.]{0,101}$/',
			'jeniskelamin_id'=> 'required|numeric|digits_between:1,10',
			'agama_id'=> 'required|numeric|digits_between:1,10',
			'jenjangstudi_id'=> 'required|numeric|digits_between:1,10',
			'gelar' => 'required|regex:/^[A-Za-z\ \.\,\-]{0,101}$/',
			'tahun_lulus' => 'required|date_format:Y|before:today|after:1900',
			'no_telp'=> 'required|regex:/^[0-9\-]{0,13}$/',
			'status_id'=> 'required|numeric|digits_between:1,10',
			'jabatan_id'=> 'required|numeric|digits_between:1,10',
			// 'email' => 'required|string|email|max:100|unique:users,email',
			// 'password' => 'required|string|min:6|max:100|confirmed',
		]);

		$users = new User;

		$users->access_id = '3';
		$users->username = $request->nip;
		$users->email = $request->email;
		$users->password = $request->password;

		$users->save();

		$gurux = new Guru;

		$gurux->nip = $request->nip;
		$gurux->nama_lengkap = $request->nama_lengkap;
		$gurux->tempat_lahir = $request->tempat_lahir;
		$gurux->tgl_lahir = $request->tgl_lahir;
		$gurux->alamat = $request->alamat;
		$gurux->jeniskelamin_id = $request->jeniskelamin_id;
		$gurux->agama_id = $request->agama_id;
		$gurux->jenjangstudi_id = $request->jenjangstudi_id;
		$gurux->gelar = $request->gelar;
		$gurux->tahun_lulus = $request->tahun_lulus;
		$gurux->no_telp = $request->no_telp;
		$gurux->status_id = $request->status_id;
		$gurux->jabatan_id = $request->jabatan_id;
		$gurux->user_id = $users->id;

		$gurux->save();

		Session::flash('success', 'Data guru berhasil ditambahkan!');

		return redirect()
			->route('guru.show', $gurux->nip);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        //
		$gurux = Guru::
			where('nip', '=', $nip)
			->first();

		return view('/gurux/show')
			->withGurux($gurux);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        //
		$gurux = Guru::
			where('nip', '=', $nip)
			->first();

		$jeniskelaminx = Jeniskelamin::
			orderBy('nama', 'asc')
			->get();
		$jeniskelaminx1 = array();
		foreach ($jeniskelaminx as $jeniskelamin) {
			$jeniskelaminx1[$jeniskelamin->id] = $jeniskelamin->nama;
		}

		$agamax = Agama::
			orderBy('nama', 'asc')
			->get();
		$agamax1 = array();
		foreach ($agamax as $agama) {
			$agamax1[$agama->id] = $agama->nama;
		}

		$jenjangstudix = Jenjangstudi::
			orderBy('nama', 'asc')
			->get();
		$jenjangstudix1 = array();
		foreach ($jenjangstudix as $jenjangstudi) {
			$jenjangstudix1[$jenjangstudi->id] = $jenjangstudi->nama;
		}

		$statusx = Status::
			orderBy('nama', 'asc')
			->get();
		$statusx1 = array();
		foreach ($statusx as $status) {
			$statusx1[$status->id] = $status->nama;
		}

		$jabatanx = Jabatan::
			orderBy('nama', 'asc')
			->get();
		$jabatanx1 = array();
		foreach ($jabatanx as $jabatan) {
			$jabatanx1[$jabatan->id] = $jabatan->nama;
		}

		return view('/gurux/edit')
			->withGurux($gurux)
			->withJeniskelaminx($jeniskelaminx1)
			->withAgamax($agamax1)
			->withJenjangstudix($jenjangstudix1)
			->withStatusx($statusx1)
			->withJabatanx($jabatanx1);
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
		$gurux = Guru::find($id);

		$this->validate($request, [
			'nip' => "required|numeric|digits:12|unique:gurux,nip,$id",
			'nama_lengkap' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tempat_lahir' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tgl_lahir' => 'required|date_format:d/m/Y|before:today|after:01/01/1900',
			'alamat' => 'required|regex:/^[a-z0-9\ \.]{0,101}$/',
			'jeniskelamin_id'=> 'required|numeric|digits_between:1,10',
			'agama_id'=> 'required|numeric|digits_between:1,10',
			'jenjangstudi_id'=> 'required|numeric|digits_between:1,10',
			'gelar' => 'required|regex:/^[A-Za-z\ \.\,\-]{0,101}$/',
			'tahun_lulus' => 'required|date_format:Y|before:today|after:1900',
			'no_telp'=> 'required|regex:/^[0-9\-]{0,13}$/',
			'status_id'=> 'required|numeric|digits_between:1,10',
			'jabatan_id'=> 'required|numeric|digits_between:1,10',
		]);

		$gurux->nip = $request->nip;
		$gurux->nama_lengkap = $request->nama_lengkap;
		$gurux->tempat_lahir = $request->tempat_lahir;
		$gurux->tgl_lahir = $request->tgl_lahir;
		$gurux->alamat = $request->alamat;
		$gurux->jeniskelamin_id = $request->jeniskelamin_id;
		$gurux->agama_id = $request->agama_id;
		$gurux->jenjangstudi_id = $request->jenjangstudi_id;
		$gurux->gelar = $request->gelar;
		$gurux->tahun_lulus = $request->tahun_lulus;
		$gurux->no_telp = $request->no_telp;
		$gurux->status_id = $request->status_id;
		$gurux->jabatan_id = $request->jabatan_id;

		$gurux->save();

		Session::flash('success', 'Data guru berhasil diperbarui!');

		return redirect()
			->route('guru.show', $gurux->nip);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$gurux = Guru::find($id);

		$gurux->delete();

		Session::flash('success', 'Data guru berhasil dihapus!');

		return redirect()
			->route('guru.index');
    }
}
