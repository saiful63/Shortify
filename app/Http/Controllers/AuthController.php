<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\UrlShrotner;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register_view(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);
    // Save data
    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=> \Hash::make($request->password)
    ]);

    // login user to dashboard
    if(\Auth::attempt($request->only('email','password')))
       {return redirect()->route('home');}

    return redirect('register')->withError('Error');
    }


    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

    if(\Auth::attempt($request->only('email','password')))
       {return redirect()->route('home');}

    return redirect('login')->withError('Login details are not valid');
    }


    

    public function home(UrlShrotner $urlShrotner){

        $urls = $urlShrotner->latest()->get();
        return view('UrlShrotner',compact('urls'));
    }

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

}



