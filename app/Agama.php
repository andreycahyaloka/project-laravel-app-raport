<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
	//
	protected $table = 'agamax';

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
		return $this->HasMany('App\Siswa', 'agama_id', 'id');
	}

	public function gurux() {
		return $this->HasMany('App\Guru', 'agama_id', 'id');
	}
}
