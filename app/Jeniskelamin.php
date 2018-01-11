<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeniskelamin extends Model
{
	//
	protected $table = 'jeniskelaminx';

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
		return $this->HasMany('App\Siswa', 'jeniskelamin_id', 'id');
	}

	public function gurux() {
		return $this->HasMany('App\Guru', 'jeniskelamin_id', 'id');
	}
}
