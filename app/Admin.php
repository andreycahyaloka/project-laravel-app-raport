<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
	use Notifiable;

	protected $guard = 'admin';
	
	use SoftDeletes;
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
	];
	
	protected $guarded = [
		'remember_token', 'created_at', 'updated_at', 'deleted_at',
	];

	public function sendPasswordResetNotification($token) {
		$this->notify(new AdminResetPasswordNotification($token));
	}
}
