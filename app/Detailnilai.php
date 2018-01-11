<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailnilai extends Model
{
	//
	protected $table = 'detailnilaix';

	protected $fillable = [
		'nilai_kodenilai_id', 'siswa_nis_id', 'nilai_tugas', 'nilai_ulangan', 'nilai_uts',
		'nilai_uas', 'nilai_akhir',
	];

	protected $hidden = [
		// 
	];

	protected $guarded = [
		'created_at', 'updated_at',
	];

	// 
	public function siswax() {
		return $this->belongsTo('App\Siswa', 'siswa_nis_id', 'id');
	}

	public function nilaix() {
		return $this->belongsTo('App\Nilai', 'nilai_kodenilai_id', 'id');
	}
}
