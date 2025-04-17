<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //SHow register/create form
    public function create(){
        return view('users.register');
    }

    //create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' =>['required', 'min:3'],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('jobs')->with('message','User created and logged in');
    }


    //show login form
    public function login(){
        return view('/users.login');
    }

    // authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            // Check if account is locked
            if (auth()->user()->account_status === 'locked') {
                auth()->logout();

                return back()
                    ->withErrors(['email' => 'Your account is currently locked. Please contact support.'])
                    ->onlyInput('email');
            }

            // If superadmin, redirect to dashboard
            if (auth()->user()->isSuperAdmin()) {
                return redirect()->route('sadmin.dashboard')
                                ->with('message','Welcome Super‑Admin!');
            }

            // Regular user redirect
            return redirect()->route('jobs')
                            ->with('message','You are now logged in');
        }

        return back()
            ->withErrors(['email' => 'Invalid Credentials'])
            ->onlyInput('email');
    }

    //logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }
    
}
