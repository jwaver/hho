<?php 

namespace App\Http\Controllers;
use DB;
use App\Models\Users;
use App\Models\UserDetails;

class ProfileController extends Controller {

	public function index($username){
		
		
		// $user = Users::where('username',$username)->first();
		// $details = UserDetails::where('user_id',$user->id)->first();


		
		try
		{
			$profile = DB::table('users')
			->where('username',$username)
			->join('user_details', 'users.id', '=', 'user_details.user_id')
			->select('*')
			->first();
			
			if($profile){
				$profile->images = $profile->images ? :'avatar.png';
				$profile->phone = json_decode($profile->phone);
				$profile->address = json_decode($profile->address);
				$profile->vehicle = json_decode($profile->vehicle);
			}
			
		}
		catch(PDOException $exception)
		{
			return 'Ooops! ' . $exception->getCode();
		}
		
		if($profile)
			return view('profile')->with(['profile' => $profile]);
		else
			return 'Ooops! ';
	}

}
