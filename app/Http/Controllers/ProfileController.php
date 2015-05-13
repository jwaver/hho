<?php 

namespace App\Http\Controllers;

class ProfileController extends Controller {

	public function index($id){
		return view('profile')->with(['id' => $id]);
	}

}
