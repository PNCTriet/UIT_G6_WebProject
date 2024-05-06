<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        // return view('auth.login');
        if (Auth::check()) {
            return view('home');
        }   
        return view('auth.login');
    }
    public function registration()
    {
        if (Auth::check()) {
            return view('login');
        }
        return view('auth.registration');
    }
    public function postRegistration(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
            'birthday' => 'required|date',
        ]);
        $data = $request->all();
        $this->create($data);
        return redirect('login')->withSuccess('You are registered successfully.');
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'password' => $data['password']
        ]);
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $checkLoginCredentials = $request->only('email', 'password');
        if (Auth::attempt($checkLoginCredentials)) {
            return redirect('home')->withSuccess('You are successfully loggedin.');
        }
        return redirect('login')->withSuccess('You login credentials are incorrect.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('home');
        }
        return redirect('login')->withSuccess('Please login to access the dashboard page.');
    }
}
