<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
	//
	protected $table = 'nilaix';

	protected $fillable = [
		'kodenilai', 'guru_nip_id', 'mapel_kodemapel_id', 'kelas_kodekelas_id',
	];

	protected $hidden = [
		// 
	];

	protected $guarded = [
		'created_at', 'updated_at',
	];

	// 
	public function gurux() {
		return $this->belongsTo('App\Guru', 'guru_nip_id', 'id');
	}

	public function mapelx() {
		return $this->belongsTo('App\Mapel', 'mapel_kodemapel_id', 'id');
	}

	public function kelasx() {
		return $this->belongsTo('App\Kelas', 'kelas_kodekelas_id', 'id');
	}

	// 
	public function detailnilaix() {
		return $this->HasMany('App\Detailnilai', 'nilai_kodenilai_id', 'id');
	}
}
