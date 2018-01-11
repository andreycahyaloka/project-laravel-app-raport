<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\SiswaResetPasswordNotification;

class Siswa extends Authenticatable
{
	//
	use Notifiable;

	protected $guard = 'siswa';

	protected $table = 'siswax';

	protected $fillable = [
		'nis', 'nama_lengkap', 'tempat_lahir', 'tgl_lahir', 'alamat',
		'jeniskelamin_id', 'agama_id','jurusan_id', 'tahun_masuk',
		'email', 'password',
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	protected $guarded = [
		'remember_token', 'created_at', 'updated_at',
	];

	// 
	public function sendPasswordResetNotification($token) {
		$this->notify(new SiswaResetPasswordNotification($token));
	}

	// 
// $this (model_name, foreign_key, local_key)
	public function jeniskelaminx() {
		return $this->belongsTo('App\Jeniskelamin', 'jeniskelamin_id', 'id');
	}

	public function agamax() {
		return $this->belongsTo('App\Agama', 'agama_id', 'id');
	}

	public function jurusanx() {
		return $this->belongsTo('App\Jurusan', 'jurusan_id', 'id');
	}

	// 
	public function detailnilaix() {
		return $this->HasMany('App\Detailnilai', 'siswa_nis_id', 'id');
	}
}
