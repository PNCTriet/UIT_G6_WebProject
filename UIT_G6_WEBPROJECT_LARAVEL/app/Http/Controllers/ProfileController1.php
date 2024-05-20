<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\user_model;
use DB;

class ProfileController1 extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:32',
            'email' => 'required|email',
            'birthday' => 'required|date',
            'address' => 'required|max:100',
            'phoneNumber' => 'required|max:20'
        ]);
        $profile = new user_model();
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->birthday = $request->input('birthday');
        $profile->address = $request->input('address');
        $profile->phoneNumber = $request->input('phoneNumber');
        $profile->save();

        return redirect()->back()->with('success');
    }

    public function get_information(){
        $infor = DB::table('user')->get();
        return view('profile', compact('infor'));
    }
}
