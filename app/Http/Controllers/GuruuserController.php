<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Guru;
use App\Siswa;
use App\Nilai;
use App\Detailnilai;
use Session;
use Illuminate\Support\Facades\Auth;

class GuruuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$guruxnipx = Auth::guard('guru')->user()->nip;

		$gurux = Guru::
			where('nip', '=', $guruxnipx)
			->first();

		$guruxidx = Auth::guard('guru')->user()->id;

		$nilaix = Nilai::
			where('guru_nip_id', '=', $guruxidx)
			->orderBy('kodenilai', 'asc')
			->paginate(10);

		return view('/guruxusers/index')
			->withGurux($gurux)
			->withNilaix($nilaix);
    }

	public function indexdetail($kodenilai) {
		// 
		$guruxnipx = Auth::guard('guru')->user()->nip;

		$gurux = Guru::
			where('nip', '=', $guruxnipx)
			->first();

		$kodenilaixidx = Nilai::
			where('kodenilai', '=', $kodenilai)
			->first();

		$detailnilaix = Detailnilai::
			where('nilai_kodenilai_id', '=', $kodenilaixidx->id)
			->orderBy('nilai_kodenilai_id', 'asc')
			->paginate(10);

		return view('/guruxusers/indexdetail')
			->withGurux($gurux)
			->withDetailnilaix($detailnilaix)
			->withKodenilaixidx($kodenilaixidx);
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
    public function editsiswa($id)
    {
        //
		$detailnilaix = detailnilai::find($id);

		return view('/guruxusers/edit')
			->withDetailnilaix($detailnilaix);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatesiswa(Request $request, $id)
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
			->route('guruuser.indexdetail', $detailnilaix->nilaix->kodenilai);
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
    }
}
