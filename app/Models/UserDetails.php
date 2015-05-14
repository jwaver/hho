<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model {

	public static function details($username){
	
		return Users::where('username',$this->username)->first();
		
	}
}
