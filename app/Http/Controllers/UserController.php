<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register Create Form
    public function create(){
        return view('users.register');
    }
    // Create new User
    public function store(Request $request){
$formfield = $request->validate([
    'name'=>['required', 'min:3'],
    'email'=>['required', 'email',Rule::unique('users','email')],
    'password'=>'required|confirmed|min:6'
]);
// Hash Password
$formfield['password']=bcrypt($formfield['password']);
// Create User
$user = User::create($formfield);
// Login
auth()->login($user);
return redirect('/')->with('message','User created and logged in' );
    }
    // Logout User
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('message', 'you have been Logged Out!');

    }
    // Show Login Form
    public function login(){
        return view('users.login');
    }
    // Authenticate
    public function authenticate(Request $request){
        $formfield = $request->validate([
            'email'=>['required', 'email'],
            'password'=>'required'
        ]);
        if(auth()->attempt($formfield)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in!');
        }
        return back()->withErrors(['email'=>'Invalid Credential'])->onlyInput('email');
    }


}

