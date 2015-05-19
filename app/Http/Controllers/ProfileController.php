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
		$Users = Users::where('username','=',$username)->first();

		if(!is_null($Users))
			return view('profile')->with(['profile' => $Users->profile()]);
		else
			abort(404);
	}

	public function update(){
		dd( Date('F d, Y',strtotime(Request::input('birthDate'))));
		
	}
}
