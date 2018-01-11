<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
	//
	protected $table = 'kelasx';

	protected $fillable = [
		'kodekelas', 'nama_kelas',
	];

	protected $hidden = [
		// 
	];

	protected $guarded = [
		'created_at', 'updated_at',
	];

	// 
	public function nilaix() {
		return $this->HasMany('App\Nilai', 'kelas_kodekelas_id', 'id');
	}
}
