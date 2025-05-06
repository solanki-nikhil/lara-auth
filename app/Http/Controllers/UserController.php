<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
       $data = $request->validate([
        'name'=> 'required|string|max:255',
        'email'=> 'required|email|max:255',
        'password'=> 'required|string|min:8',
       ]);

      $user = User::create($data);

      if ($user) {
        return redirect()->route('login')->with('success','User registered successfully!');
      }
    }
}
