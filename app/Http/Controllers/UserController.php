<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
       $data = $request->validate([
        'name'=> 'required',
        'email'=> 'required|email',
        'password'=> 'required|confirmed',
       ]);

      $user = User::create($data);

      if ($user) {
        return redirect()->route('login')->with('success','User registered successfully!');
      }
    }
    
    public function login(Request $request){

      $credentials = $request->validate([
        'email'=> 'required|email',
        'password'=> 'required'
      ]);

      if (Auth::attempt($credentials)) {
        return redirect()->route('dashboard')->with('success','Login successful!');
      }else {
        return redirect()->route('login')->with('error','Please login first!');
      }
    }

    public function dashboard(){
     return view('dashboard');
      }

    public function innerpage(){
     return view('inner'); 
      
    }
    
    public function logout(){
      Auth::logout();
      return redirect()->route('login')->with('success','Logout successful!');
    }
}
