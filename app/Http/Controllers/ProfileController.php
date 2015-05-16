<?php 

namespace App\Http\Controllers;
use DB;
use Request;
use App\Models\Users;
use App\Models\UserDetails;

class ProfileController extends Controller {

	public function index(){
		return 'Oooops!';
	}
	
	public function profile($username){
		
		$profile = Users::where('username','=',$username)->first()->profile();
		
		if($profile)
			return view('profile')->with(['profile' => $profile]);
		else
			return 'Ooops! ';
	}

	public function update(){
		dd( Date('F d, Y',strtotime(Request::input('birthDate'))));
		
	}
}
