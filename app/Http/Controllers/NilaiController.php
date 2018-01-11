<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Nilai;
use App\Guru;
use App\Mapel;
use App\Kelas;
use App\Detailnilai;
use Session;
use PDF;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$nilaix = Nilai::
			orderBy('kodenilai', 'asc')
			->paginate(10);

		return view('/nilaix/index')
			->withNilaix($nilaix);
    }

	public function print($id) {
		// 
		$nilaix = Nilai::find($id);

		$detailnilaix = Detailnilai::
			where('nilai_kodenilai_id', '=', $id)
			->orderBy('siswa_nis_id', 'asc')
			->get();

		// return view('/nilaix/printdompdf')
		// 	->withNilaix($nilaix)
		// 	->withDetailnilaix($detailnilaix);

		$data = [
				'nilaix' => $nilaix,
				'detailnilaix' => $detailnilaix,
			];

		$dompdf = PDF::loadView('nilaix.printdompdf', $data)->setPaper('A4', 'landscape');

		return $dompdf->download('printdompdf.pdf');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$gurux = Guru::
			orderBy('nama_lengkap', 'asc')
			->get();

		$mapelx = Mapel::
			orderBy('nama_mapel', 'asc')
			->get();

		$kelasx = Kelas::
			orderBy('nama_kelas', 'asc')
			->get();

		return view('/nilaix/create')
			->withGurux($gurux)
			->withMapelx($mapelx)
			->withKelasx($kelasx);
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
			'kodenilai' => 'required|regex:/^((nl)([0-9]{3}))$/|unique:nilaix,kodenilai',
			'guru_nip_id' => 'required|numeric|digits_between:1,10',
			'mapel_kodemapel_id' => 'required|numeric|digits_between:1,10',
			'kelas_kodekelas_id' => 'required|numeric|digits_between:1,10|unique:nilaix,kelas_kodekelas_id,NULL,id,mapel_kodemapel_id,'.$request->mapel_kodemapel_id.',guru_nip_id,'.$request->guru_nip_id,
		]);

		$nilaix = new Nilai;

		$nilaix->kodenilai = $request->kodenilai;
		$nilaix->guru_nip_id = $request->guru_nip_id;
		$nilaix->mapel_kodemapel_id = $request->mapel_kodemapel_id;
		$nilaix->kelas_kodekelas_id = $request->kelas_kodekelas_id;

		$nilaix->save();

		Session::flash('success', 'Data nilai berhasil ditambahkan!');

		return redirect()
			->route('nilai.show', $nilaix->kodenilai);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kodenilai)
    {
        //
		$nilaix = Nilai::
			where('kodenilai', '=', $kodenilai)
			->first();

		$detailnilaix = Detailnilai::
			where('nilai_kodenilai_id', '=', $nilaix->id)
			->paginate();

		return view('/nilaix/show')
			->withNilaix($nilaix)
			->withDetailnilaix($detailnilaix);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kodenilai)
    {
        //
		$nilaix = Nilai::
			where('kodenilai', '=', $kodenilai)
			->first();

		$gurux = Guru::
			orderBy('nama_lengkap', 'asc')
			->get();
		$gurux1 = array();
		foreach ($gurux as $guru) {
			$gurux1[$guru->id] = $guru->nama_lengkap;
		}

		$mapelx = Mapel::
			orderBy('nama_mapel', 'asc')
			->get();
		$mapelx1 = array();
		foreach ($mapelx as $mapel) {
			$mapelx1[$mapel->id] = $mapel->nama_mapel;
		}

		$kelasx = Kelas::
			orderBy('nama_kelas', 'asc')
			->get();
		$kelasx1 = array();
		foreach ($kelasx as $kelas) {
			$kelasx1[$kelas->id] = $kelas->nama_kelas;
		}

		return view('/nilaix/edit')
			->withNilaix($nilaix)
			->withGurux($gurux1)
			->withMapelx($mapelx1)
			->withKelasx($kelasx1);
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
		$nilaix = Nilai::find($id);

		$this->validate($request, [
			'kodenilai' => "required|regex:/^((nl)([0-9]{3}))$/|unique:nilaix,kodenilai,$id",
			'guru_nip_id' => 'required|numeric|digits_between:1,10',
			'mapel_kodemapel_id' => 'required|numeric|digits_between:1,10',
			'kelas_kodekelas_id' => 'required|numeric|digits_between:1,10|unique:nilaix,kelas_kodekelas_id,'.$id.',id,mapel_kodemapel_id,'.$request->mapel_kodemapel_id.',guru_nip_id,'.$request->guru_nip_id,
		]);

		$nilaix->kodenilai = $request->kodenilai;
		$nilaix->guru_nip_id = $request->guru_nip_id;
		$nilaix->mapel_kodemapel_id = $request->mapel_kodemapel_id;
		$nilaix->kelas_kodekelas_id = $request->kelas_kodekelas_id;

		$nilaix->save();

		Session::flash('success', 'Data nilai berhasil diperbarui!');

		return redirect()
			->route('nilai.show', $nilaix->kodenilai);
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
		$nilaix = Nilai::find($id);

		$nilaix->delete();

		Session::flash('success', 'Data nilai berhasil dihapus!');

		return redirect()
			->route('nilai.index');
    }
}
