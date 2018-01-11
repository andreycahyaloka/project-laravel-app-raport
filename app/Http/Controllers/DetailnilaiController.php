<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Detailnilai;
use App\Siswa;
use App\Nilai;
use Session;
use Illuminate\Validation\Rule;

class DetailnilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$detailnilaix = Detailnilai::
			orderBy('nilai_kodenilai_id', 'asc')
			->paginate(10);

		return view('/detailnilaix/index')
			->withDetailnilaix($detailnilaix);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$nilaix = Nilai::
			orderBy('kodenilai', 'asc')
			->get();

		$siswax = Siswa::
			orderBy('nama_lengkap', 'asc')
			->get();

		return view('/detailnilaix/create')
			->withNilaix($nilaix)
			->withSiswax($siswax);
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
		// column_to_validate => unique:table_name,column_to_validate,id_to_ignore,id_column,
		// other_column_2,other_column_value_2,other_column_n,other_column_value_n,
		$this->validate($request, [
			'nilai_kodenilai_id' => 'required|numeric|digits_between:1,10',
			'siswa_nis_id' => 'required|numeric|digits_between:1,10|unique:detailnilaix,siswa_nis_id,NULL,id,nilai_kodenilai_id,'.$request->nilai_kodenilai_id,
			// use an array if regex has a pipe delimiters in it
			'nilai_tugas' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_ulangan' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_uts' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_uas' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_akhir' => 'required',
		]);

		$detailnilaix = new Detailnilai;

		$detailnilaix->nilai_kodenilai_id = $request->nilai_kodenilai_id;
		$detailnilaix->siswa_nis_id = $request->siswa_nis_id;
		$detailnilaix->nilai_tugas = $request->nilai_tugas;
		$detailnilaix->nilai_ulangan = $request->nilai_ulangan;
		$detailnilaix->nilai_uts = $request->nilai_uts;
		$detailnilaix->nilai_uas = $request->nilai_uas;
		$detailnilaix->nilai_akhir = $request->nilai_akhir;

		$detailnilaix->save();

		Session::flash('success', 'Data detail nilai berhasil ditambahkan!');

		return redirect()
			->route('detailnilai.index');
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
		$detailnilaix = Detailnilai::find($id);

		return view('/detailnilaix/show')
			->withDetailnilaix($detailnilaix);
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
		$detailnilaix = detailnilai::find($id);

		return view('/detailnilaix/edit')
			->withDetailnilaix($detailnilaix);
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
		$detailnilaix = detailnilai::find($id);

		$this->validate($request, [
			'nilai_tugas' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_ulangan' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_uts' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_uas' => ['required', 'regex:/^([0-9]?[0-9]{2}).([0-9]{2})|100.00$/'],
			'nilai_akhir' => 'required',
		]);

		$detailnilaix->nilai_tugas = $request->nilai_tugas;
		$detailnilaix->nilai_ulangan = $request->nilai_ulangan;
		$detailnilaix->nilai_uts = $request->nilai_uts;
		$detailnilaix->nilai_uas = $request->nilai_uas;
		$detailnilaix->nilai_akhir = $request->nilai_akhir;

		$detailnilaix->save();

		Session::flash('success', 'Data detail nilai berhasil ditambahkan!');

		return redirect()
			->route('detailnilai.show', $detailnilaix->id);
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
		$detailnilaix = detailnilai::find($id);

		$detailnilaix->delete();

		Session::flash('success', 'Data detail nilai berhasil dihapus!');

		return redirect()
			->route('detailnilai.index');
    }
}
