<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenjangstudi extends Model
{
	//
	protected $table = 'jenjangstudix';

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
		return $this->HasMany('App\Guru', 'jenjangstudi_id', 'id');
	}
}
