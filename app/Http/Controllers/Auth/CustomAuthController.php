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

            if ($user->roles === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // If NOT admin, redirect to agent dashboard
            return redirect()->route('agent.dashboard');
        }

        return back()->with('error', 'Invalid credentials.');
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
        $user->assignRole('agent');

        Auth::login($user);
        return redirect()->route('agent.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('custom.login');
    }
}
