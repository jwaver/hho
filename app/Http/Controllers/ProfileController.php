<?php 

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\UserDetails;

class ProfileController extends Controller {

	public function index($username){
		
		$profile = Users::getProfile($username);
		$details = (new UserDetails)->get();
		
		dd($details);
		
		return view('profile')->with(['profile' => $profile]);
	}

}
