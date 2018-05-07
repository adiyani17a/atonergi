<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Request;
use App\mMember;
use App\d_comp_coa;
use App\d_comp_trans;
use App\cabang;

use Validator;
use Carbon\Carbon;
use Session;

use DB;
class loginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function login(Request $req) {
        $username = $req->username;
        $password = $req->password;
        $user = mMember::whereRaw("m_username  = '$req->username'")->first();
        if ($user && $user->m_passwd == sha1(md5('passwordAllah') + $req->password)) {
            return response()->json([
                        'success' => 'succes',
            ]);
        } else {
            return response()->json([
                        'success' => 'gagal',
            ]);
        }
    }

    public function authenticate(Request $req) {
        $rules = array(
            'username' => 'required|min:3', // make sure the email is an actual email
            'password' => 'required|min:2' // password can only be alphanumeric and has to be greater than 3 characters
        );
    	// dd($req->all());
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return Redirect('/')
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput($req->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            $username = $req->username;
            $password = $req->password;
           	$pass_benar=sha1(md5('passwordAllah').$password);
            $cari_user = DB::table('d_mem')
            			   ->where('m_username',$username)
            			   ->first();

            $user_valid = [];

           	if ($cari_user != null) {
           		array_push($user_valid,1);

           		$cari_pass = DB::table('d_mem')
	            			   ->where('m_username',$username)
	            			   ->where('m_password',$pass_benar)
	            			   ->first();

            	if ($cari_pass != null) {
           			array_push($user_valid,1);
           			DB::table('d_mem')->where('m_username',$username)->update([
                     'updated_at'=>Carbon::now(),
                 	]); 
                    Auth::login($user);
            	}else{
           			array_push($user_valid,0);
           			return Redirect('/')->with($cari_pass);
            	}
           	}else{
           		array_push($user_valid,0);
           		array_push($user_valid,0);
           		return Redirect('/')->with($cari_pass);
           	}
            

        }
    }
}
