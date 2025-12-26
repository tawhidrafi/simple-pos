<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\Admin\LoginHistory;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // signup page
    public function index()
    {
        return view('auth.signup');
    }
    // signup
    public function signup(SignupRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $validatedData['photo'] = $path;
        }

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        // Trigger the Registered event to send the verification email
        //event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registration Successful. Please verify your email.');
    }
    // login page
    public function loginView()
    {
        return view('auth.login');
    }
    // login
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $request->session()->regenerate();

            LoginHistory::create([
                'user_id' => Auth::id(),
                'login_time' => now(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return back()->withInput()->withErrors(['login_failed' => 'Email or password is wrong']);
    }
    // logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
