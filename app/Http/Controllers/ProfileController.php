<?php 

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;

class ProfileController extends Controller {

	public function index($username){
		// dd(Users::all());
		return view('profile')->with(['username' => $username]);
	}

}
