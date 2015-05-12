<?php 

namespace App\Http\Controllers;
use DB;
use Input;
use Illuminate\Support\Str;

class RegisterController extends Controller {

	public function index(){
		return view('register')->with(['generateId'=>static::generateId()]);
	}
	
	public function save(){
		$post = Input::all();
		
		try{
			$id = DB::table('users')->insertGetId(array(
				'code_id'	=> $post['profileId'],
				'email'		=> $post['email'],
				'password'	=> Str::random($length = 16),
				'first_name'=> $post['firstName'],
				'last_name'	=> $post['lastName'],
			));
			
			$id = DB::table('user_details')->insertGetId(array(
				'user_id'		=> $id,
				'level'			=> "",
				'package_type'	=> $post['packageType'],
				'referrer_id'	=> "",
				'birth_date'	=> $post['birthDate'],
				'gender'		=> $post['gender'],
				'marital_status'=> $post['status'],
				'citizenship'	=> $post['citizenship'],
				'phone'			=> json_encode(["home"=>$post['contact']['home'],"mobile"=>$post['contact']['mobile']]),
				'address'		=> json_encode(array("present"=>$post['contact']['presentAddress'], "permanent"=>$post['contact']['permanentAddress'])),
				'zip'			=> $post['contact']['zipCode'],
				'vehicle'		=> json_encode($post['vehicle']),
				'notes'			=> $post['notes'],
			));
		}
		catch(\Illuminate\Database\QueryException $e)
		{
			return view('register')->with(['generateId'=>$this->generateId(),'error'=>true]);
		}
	
		return view('register')->with(['generateId'=>$this->generateId()]);
	}
	
	private static function generateId(){
		$chars = array_merge(range('A', 'F'), range(1, 9));
		shuffle($chars);
		return date("Y") . ' - ' . substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length=10);
	}

}
