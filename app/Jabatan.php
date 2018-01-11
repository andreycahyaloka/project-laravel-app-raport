<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
	//
	protected $table = 'jabatanx';

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
	public function gurux() {
		return $this->HasMany('App\Guru', 'jabatan_id', 'id');
	}
}
