<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('user.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
            'password' => 'required|min:6|max:20'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)):
                return redirect(route('login'))
                          ->withErrors(trans('auth.failed'))
                          ->withInput();
        endif;
        
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard')->withSuccess('Hello');
    }


    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function dashboard(){
        if(Auth::check()){
           return view('dashboard'); 
        }
        return redirect(route('login'))->withErrors('Vous n\'êtes pas autorisé à accéder');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }
}