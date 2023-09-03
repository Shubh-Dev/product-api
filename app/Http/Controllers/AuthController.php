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
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        smilify('success', 'You are successfully reconnected');
        return Inertia::render('Dashboard');
    }

    throw ValidationException::withMessages([
        'email' => __('auth.failed'),
    ]);
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
        sleep(1);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:3|confirmed',
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



