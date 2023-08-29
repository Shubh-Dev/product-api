<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
   
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    try {
        Auth::attempt($credentials);
    } catch (AuthenticationException $e) {
        session()->flash('errors', [$e->getMessage()]);
         return redirect()->route('login')->withErrors(['email' => $e->getMessage()]);
    }
    notify()->success('You are logged in!');
    return redirect()->intended('dashboard');
}

        


    public function register(Request $request ) 
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        Auth::login($user);
        notify()->success('Account created!');
        return redirect()->intended('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        notify()->success('You are logged out!');
        return redirect('/');
    }

}



