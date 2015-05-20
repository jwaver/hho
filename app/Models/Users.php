<?php 

namespace App\Models;
use DB;
use DateTime;
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
	protected $fillable = ['code_id','username', 'email', 'password','first_name','last_name'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
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
	
	public static function updateProfile($userId,$post){

		return DB::transaction(function() use($userId,$post) {
			
			DB::table('users')
			->where('id','=',$userId)
			->update([
				'email' 	 => $post['email'],
				// 'password' 	 => $post['password'],
				'first_name' => $post['firstName'],
				'last_name'  => $post['lastName'],
			]);
			
			DB::table('user_details')
			->where('user_id','=',$userId)
			->update([
				'images' 		 => '',
				'birth_date' 	 => \Carbon\Carbon::parse($post['birthDate'])->toDateTimeString(),
				'gender' 		 => $post['gender'],
				'marital_status' => $post['status'],
				'citizenship' 	 => $post['citizenship'],
				'phone' 		 => json_encode($post['phone']),
				'address' 		 => json_encode($post['address']),
				'vehicle' 		 => json_encode($post['vehicle']),
				'notes' 		 => $post['notes'],
			]);
			
			
			DB::commit();
		});
	}
	
}













