<?php 

namespace App\Http\Controllers;
use DB;
use Request;
use Redirect;
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
		if(!Users::where('username','=',Request::input('username')))
		abort(404);
		
		$userId = Users::where('username','=',Request::input('username'))->first()->toArray()['id'];

		Users::updateProfile($userId,Request::All());
		return Redirect::back();
	}
}
