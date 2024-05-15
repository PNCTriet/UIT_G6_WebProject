<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use DB;

class ProfileController extends Controller
{
    //
    public function create(){
        return view('profile');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|max:32',
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|date',
            'address' => 'required|max:100',
            'phone' => 'required|max:20'
        ]);
        $profile = new Profile();
        $profile->username = $request->input('username');
        $profile->email = $request->input('email');
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->dob = $request->input('dob');
        $profile->address = $request->input('address');
        $profile->phone = $request->input('phone');
        $profile->save();


        return redirect()->back()->with('success');
    }

    public function get_information(){
        $infor = DB::table('profiles')->get();
        return view('profile', compact('infor'));
    }
}