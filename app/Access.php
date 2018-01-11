<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
	//
	protected $table = 'accesses';

	protected $fillable = [
		'name',
	];

	protected $hidden = [
		'name',
	];

	protected $guarded = [
		'created_at', 'updated_at',
	];

	public function users() {
		return $this->HasMany('App\User', 'access_id', 'id');
	}
}
