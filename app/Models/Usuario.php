<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

	use Notifiable;

	protected $table = "usuarios";
	protected $primaryKey = 'id_usuario';
	
	protected $fillable = ['email', 'password', 'is_admin'];

    protected $casts = [
        'deleted_at' => 'date',
        'updated_at' => 'date',
    ];

    public static $loginRules = [
    	'email' => 'required|email',
    	'password' => 'required|min:4'
	];
	
	// protected $hidden = [
    //     'password', 'remember_token',
    // ];

}
