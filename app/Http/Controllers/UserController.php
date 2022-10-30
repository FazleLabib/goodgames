<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    function checklogin(Request $request)
	{
		//create a validation of login 
		$this->validate($request,[
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:5'
		]);

        $user_data = array(
			'email' => $request->get('email'), 
			'password' => $request->get('password')
		);

		//if validation in success, so it will show ok otherwise back to with required field.
		if(Auth::attempt($user_data)){
			return redirect('home');
		}else{
			return back()->with('error','Wrong login details');
		}
	}

    function successlogin() {
        return view('home');
    }
}
