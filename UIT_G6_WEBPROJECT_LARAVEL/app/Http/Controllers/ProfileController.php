<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    // public function edit(Request $request): View
    // {
    //     return view('profile', [
    //         'user' => $request->user(),
    //     ]);
    // }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    public function update(Request $request)
    {
        $email = Auth::user()->email;
        $user =User::where('email',$email)->first();
        $users =users::where('email',$email)->first();
        if($request->has('avatar')){
            $file =$request->file('avatar');
            $img_type =$file->getClientOriginalExtension();
            $img_name =time().".".$img_type;
            $file->move('avartar',$img_name);
            if(File::exists($user->avartar)){
                File::delete($user->avartar);
            }
            $user->avartar="avartar/{$img_name}";
           
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phoneNumber=$request->phone;
        $user->address=$request->address;
        $user->updated_at =NOW();
        $user->save();

        $users->name=$request->name;
        $users->email=$request->email;
        $users->updated_at=NOW();
        $users->save();


      

        return redirect()->to('/profile')->with('status', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required|current_password',
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/');
    }

    public function get_information(){
        $infor = DB::table('user')->get();
        return view('profile', compact('infor'));
    }
    
}
