<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
class UserController extends Controller
{
	function index() {
		return view('login');
	}

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

	function logout() {
		Auth::logout();
		return redirect('/');
	}

	function update(Request $request) {
        $password =  Auth::User()->password;
		$user_id = Auth::User()->id;
		$user = User::findorFail($user_id);
		$user->name = $request->input('name');
		$user->email = $request->input('email');
        if($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

		if($request->hasfile('image')) {
			$destination = 'images/'.$user->image;
			if(File::exists($destination)) {
				File::delete($destination);
			}
			$file = $request->file('image');
			$extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
            $user->image = $filename;
		}
		$user->update();
		return redirect()->back()->with('message','Updated Information Successfully');
	}
}
