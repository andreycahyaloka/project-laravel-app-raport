<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use Notifiable;
	
	use SoftDeletes;
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_id', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'access_id', 'password', 'remember_token',
	];
	
	protected $guarded = [
		'remember_token', 'created_at', 'updated_at', 'deleted_at',
	];

	public function accesses() {
		return $this->belongsTo('App\Access', 'access_id', 'id');
	}

	// 
	public function gurux() {
		return $this->HasOne('App\Guru', 'user_id', 'id');
	}
}
