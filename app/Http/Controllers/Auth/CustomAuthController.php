<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.dual-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            //dd(Auth::user());
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'agent') {
                return redirect()->route('agent.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('custom.login')->with('error', 'Unauthorized role.');
            }
        }

        return back()->with('error', 'Invalid credentials. Please try again.');
    }




    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assign "agent" role by default
        $user->assignRole('admin');

        Auth::login($user);
        return redirect()->back()->with('success', 'Agent registered successfully! You can now log in.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('custom.login');
    }
}
