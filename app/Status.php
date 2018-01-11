<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	//
	protected $table = 'statusx';

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
		return $this->HasMany('App\Guru', 'status_id', 'id');
	}
}
