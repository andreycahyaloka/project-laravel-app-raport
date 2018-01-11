<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
	//
	protected $table = 'mapelx';

	protected $fillable = [
		'kodemapel', 'nama_mapel', 'tahun_ajaran', 'semester',
	];

	protected $hidden = [
		// 
	];

	protected $guarded = [
		'created_at', 'updated_at',
	];

	// 
	public function nilaix() {
		return $this->HasMany('App\Nilai', 'mapel_kodemapel_id', 'id');
	}
}
