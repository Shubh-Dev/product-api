<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;
use Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
   
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    try {
        Auth::attempt($credentials);
    } catch (AuthenticationException $e) {
        session()->flash('errors', [$e->getMessage()]);
         return Inertia::render('Login')->withErrors(['email' => $e->getMessage()]);
    }
    notify()->success('You are logged in!');
    return redirect('/dashboard');
}

// public function openLoginForm()
// {
//     return redirect('/login');
// }

public function openRegisterForm()
{ 
    return Inertia::render('Register');
}
        


    public function register(Request $request ) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        notify()->success('You are logged in!');
        return redirect('/dashboard');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        notify()->success('You are logged out!');
        return redirect('/');
    }

}



