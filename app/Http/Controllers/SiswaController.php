<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Siswa;
use App\Jeniskelamin;
use App\Agama;
use App\Jurusan;
use Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//
		$siswax = Siswa::
			orderBy('nis', 'asc')
			->paginate(10);

		return view('/siswax/index')
			->withSiswax($siswax);
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

		$jurusanx = Jurusan::
			orderBy('nama', 'asc')
			->get();

		return view('/siswax/create')
			->withJeniskelaminx($jeniskelaminx)
			->withAgamax($agamax)
			->withJurusanx($jurusanx);
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
			'nis' => 'required|numeric|digits:12|unique:siswax,nis',
			'nama_lengkap' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tempat_lahir' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tgl_lahir' => 'required|date_format:d/m/Y|before:today|after:01/01/1900',
			'alamat' => 'required|regex:/^[a-z0-9\ \.]{0,101}$/',
			'jeniskelamin_id'=> 'required|numeric|digits_between:1,10',
			'agama_id'=> 'required|numeric|digits_between:1,10',
			'jurusan_id'=> 'required|numeric|digits_between:1,10',
			'tahun_masuk' => 'required|date_format:Y|before:today|after:1900',
		]);

		$siswax = new Siswa;

		$siswax->nis = $request->nis;
		$siswax->nama_lengkap = $request->nama_lengkap;
		$siswax->tempat_lahir = $request->tempat_lahir;
		$siswax->tgl_lahir = $request->tgl_lahir;
		$siswax->alamat = $request->alamat;
		$siswax->jeniskelamin_id = $request->jeniskelamin_id;
		$siswax->agama_id = $request->agama_id;
		$siswax->jurusan_id = $request->jurusan_id;
		$siswax->tahun_masuk = $request->tahun_masuk;

		$siswax->save();

		Session::flash('success', 'Data siswa berhasil ditambahkan!');

		return redirect()
			->route('siswa.show', $siswax->nis);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nis)
    {
		//
		$siswax = Siswa::
			where('nis', '=', $nis)
			->first();

		return view('/siswax/show')
			->withSiswax($siswax);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nis)
    {
		//
		$siswax = Siswa::
			where('nis', '=', $nis)
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

		$jurusanx = Jurusan::
			orderBy('nama', 'asc')
			->get();
		$jurusanx1 = array();
		foreach ($jurusanx as $jurusan) {
			$jurusanx1[$jurusan->id] = $jurusan->nama;
		}

		return view('/siswax/edit')
			->withSiswax($siswax)
			->withJeniskelaminx($jeniskelaminx1)
			->withAgamax($agamax1)
			->withJurusanx($jurusanx1);
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
		$siswax = Siswa::find($id);

		$this->validate($request, [
			'nis' => "required|numeric|digits:12|unique:siswax,nis,$id",
			'nama_lengkap' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tempat_lahir' => 'required|regex:/^[a-z\ ]{0,101}$/',
			'tgl_lahir' => 'required|date_format:d/m/Y|before:today|after:01/01/1900',
			'alamat' => 'required|regex:/^[a-z0-9\ \.]{0,101}$/',
			'jeniskelamin_id'=> 'required|numeric|digits_between:1,10',
			'agama_id'=> 'required|numeric|digits_between:1,10',
			'jurusan_id'=> 'required|numeric|digits_between:1,10',
			'tahun_masuk' => 'required|date_format:Y|before:today|after:1900',
		]);
		
		$siswax->nis = $request->input('nis');
		$siswax->nama_lengkap = $request->nama_lengkap;
		$siswax->tempat_lahir = $request->tempat_lahir;
		$siswax->tgl_lahir = $request->tgl_lahir;
		$siswax->alamat = $request->alamat;
		$siswax->jeniskelamin_id = $request->jeniskelamin_id;
		$siswax->agama_id = $request->agama_id;
		$siswax->jurusan_id = $request->jurusan_id;
		$siswax->tahun_masuk = $request->tahun_masuk;

		$siswax->save();

		Session::flash('success', 'Data siswa berhasil diperbarui!');

		return redirect()
			->route('siswa.show', $siswax->nis);
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
		$siswax = Siswa::find($id);

		$siswax->delete();

		Session::flash('success', 'Data siswa berhasil dihapus!');

		return redirect()
			->route('siswa.index');
    }
}
