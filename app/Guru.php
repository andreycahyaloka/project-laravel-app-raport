<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\GuruResetPasswordNotification;

class Guru extends Authenticatable
{
	//
	use Notifiable;

	protected $guard = 'guru';

	protected $table = 'gurux';

	protected $fillable = [
		'nip', 'nama_lengkap', 'tempat_lahir', 'tgl_lahir', 'alamat',
		'jeniskelamin_id', 'agama_id', 'jenjangstudi_id', 'gelar', 'tahun_lulus',
		'no_telp', 'status_id', 'jabatan_id',
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
		$this->notify(new GuruResetPasswordNotification($token));
	}

	// 
	public function jeniskelaminx() {
		return $this->belongsTo('App\Jeniskelamin', 'jeniskelamin_id', 'id');
	}

	public function agamax() {
		return $this->belongsTo('App\Agama', 'agama_id', 'id');
	}

	public function jenjangstudix() {
		return $this->belongsTo('App\Jenjangstudi', 'jenjangstudi_id', 'id');
	}

	public function statusx() {
		return $this->belongsTo('App\Status', 'status_id', 'id');
	}

	public function jabatanx() {
		return $this->belongsTo('App\Jabatan', 'jabatan_id', 'id');
	}

	// 
	public function nilaix() {
		return $this->HasMany('App\Nilai', 'guru_nip_id', 'id');
	}
}
