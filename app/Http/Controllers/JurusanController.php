<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jurusan;
use Session;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$jurusanx = Jurusan::
			orderBy('nama', 'asc')
			->paginate(5);

		return view('/jurusanx/index')
			->withJurusanx($jurusanx);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
			'nama' => 'required|regex:/^[a-z\ ]{0,101}$/|unique:jurusanx,nama',
		]);

		$jurusanx = new Jurusan;

		$jurusanx->nama = $request->nama;

		$jurusanx->save();

		Session::flash('success', 'Data jurusan berhasil ditambahkan!');

		return redirect()
			->route('jurusan.index');
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
		$jurusanx = Jurusan::
			where('id', '=', $id)
			->first();
		
		return view('/jurusanx/edit')
			->withJurusanx($jurusanx);
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
		$jurusanx = Jurusan::find($id);

		$this->validate($request, [
			'nama' => "required|regex:/^[a-z\ ]{0,101}$/|unique:jurusanx,nama,$id",
		]);

		$jurusanx->nama = $request->nama;

		$jurusanx->save();

		Session::flash('success', 'Data jurusan berhasil diperbarui!');

		return redirect()
			->route('jurusan.index');
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
		$jurusanx = Jurusan::find($id);

		$jurusanx->delete();

		Session::flash('success', 'Data jurusan berhasil dihapus!');

		return redirect()
			->route('jurusan.index');
    }
}
