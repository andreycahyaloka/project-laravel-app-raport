<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
	//
	protected $table = 'jurusanx';

	protected $fillable = [
		'nama',
	];

	protected $hidden = [
		// 
	];

	protected $guarded = [
		'created_at', 'updated_at',
	];

	// 
	public function siswax() {
		return $this->HasMany('App\Siswa', 'jurusan_id', 'id');
	}
}
