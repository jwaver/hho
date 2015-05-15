<?php 

namespace App\Models;
use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Users extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function details(){
		return $this->id;
		return $this->hasOne('App\Models\UserDetails');
	}
	
	public function profile(){

		try
		{
			$profile = DB::table('users')
			->where('username',$this->username)
			->join('user_details', 'users.id', '=', 'user_details.user_id')
			->select('*')
			->first();

			if($profile){
				$profile->images = $profile->images ? "uploads/".$profile->image : 'images/avatar.png';
				$profile->phone = json_decode($profile->phone);
				$profile->address = json_decode($profile->address);
				$profile->vehicle = json_decode($profile->vehicle);
			}
			return $profile;
		}
		catch(PDOException $exception)
		{
			return false;
		}
	}
	
}