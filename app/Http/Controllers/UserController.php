<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;




class UserController extends Controller
{
    //
    function actionLogin(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($credentials)) {
            
            $request->session()->put('userid', $user->id);
            
            return redirect('wa-admin')->with('success', 'You are successfully Loggedin');
        } else {
            return redirect('wa-admin/login')->with('error', 'Email & Pass are not matching');
        }

    }

    function logout(){
        
        Session::flush();
        return redirect('wa-admin/login')->with('info', 'You are successfully loggedout');
    }

    static function getUserdata(){

        return User::find(Session::get('userid'));
        
    }
}
