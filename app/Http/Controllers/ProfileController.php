<?php 

namespace App\Http\Controllers;
use App\Models\Users;

class ProfileController extends Controller {

	public function index($username){
		
		$profile = Users::getProfile($username);
		
		return view('profile')->with(['profile' => $profile]);
		
	}

}
