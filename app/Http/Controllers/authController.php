<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function Login(){
        return view('login');
    }

    public function LoginAccount(Request $req){
        $credetials = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if(Auth::attempt($credetials)){
            return redirect('/dashboard/notes');
        }

        return back()->with('error', 'Wrong Email and Password');
    }

    public function register(){
        return view('register');
    }

    public function registerAccount(Request $request){
        $user = new User();

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('registered', 'Successfully Registered!');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
    
}
