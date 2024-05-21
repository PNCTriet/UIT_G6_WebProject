<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\users;
use App\Models\User_credential;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        // return view('auth.login');
        if (Auth::check()) {
            // dd(Auth::getUser()->role_id);
            if(Auth::user()->role_id!=1){
                return Redirect::to('/index');
            }else{
                return view('home',[
                    
                    'res' => DB::select("SELECT movie.id,title,description,poster_link FROM movie 
                                            INNER JOIN movie_link on movie_link.id =movie.link_id
                                            ORDER BY created_at DESC
                                            LIMIT 0,10")
                ]);
            }
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
        $data['role_id'] = 1;
        //$data['password'] = Hash::make($data['password']); // Băm mật khẩu
        $this->create($data);
        return redirect('login')->withSuccess('You are registered successfully.');
    }
    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'role_id' => $data['role_id'] ?? 1
            //'password' => $data['password']
        ]);
    
        if ($user) {
            User_credential::create([
                'user_id' => $user->id,
                'email' => $data['email'],
                'password' => Hash::make($data['password']) 
            ]);

            users::create([
                'name' => $data['name'],
                'email' => $data['email'],
                //'birthday' => $data['birthday'],
                'password' => $data['password']
            ]);
        }
    
        return $user;
    }
    public function postLogin(Request $request)
    { 
        // $credentials = $request->only('email', 'password');
        // $userCredential = User_credential::where('email', $credentials['email'])->first();
        
        // // // Log mật khẩu từ người dùng
        // // info('Mật khẩu từ người dùng: ' . $credentials['password']);

        // // // Log mật khẩu đã băm trong cơ sở dữ liệu
        // // info('Mật khẩu đã băm trong cơ sở dữ liệu: ' . $userCredential->password);

        // if (Hash::check($credentials['password'], $userCredential->password)) {
        //     return redirect('home')->withSuccess('You are successfully logged in.');
        // }
    
        // return redirect('login')->withSuccess('Your login credentials are incorrect.');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        $users = users::where('email', $credentials['email'])->first();
        $User = User::where('email', $credentials['email'])->first();
         
        if ($users){


        // Log mật khẩu từ người dùng
        info('Mật khẩu từ người dùng: ' . $credentials['password']);

        // Log mật khẩu đã băm trong cơ sở dữ liệu
        info('Mật khẩu đã băm trong cơ sở dữ liệu: ' . $users->password);

        // Log mật khẩu đã băm trong cơ sở dữ liệu
        info('ROLE_ID : ' . $User->role_id);

        if (Hash::check($credentials['password'], $users->password)) {
            //     return redirect('home')->withSuccess('You are successfully logged in.');
            //info('Mật khẩu accepted ');
            if ($User->role_id ==1) {
                
                Auth::login($User);
               
                return redirect('home')->withSuccess('You are successfully logged in.');
            } else {
                Auth::login($User);
               
                return redirect('index')->withSuccess('You are successfully logged in.');
            }
            
        }
        
        }
        
        // if ($user && Hash::check($credentials['password'], $user->password)) {
        //     if (Auth::login($user)) {
        //         return redirect('home')->withSuccess('You are successfully logged in.');
        //     }
        // }
        return redirect('')->withSuccess('Your login credentials are incorrect'); 
    }

    public function logout(Request $request)
    {
       
        // Session::flush();
        // if (Auth::check()) {
        //     return view('home');
        // }
        // return redirect('login');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        if(Auth::check())return Redirect::to('/home');
        return Redirect::to('/login');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('home');
        }
        return redirect('login')->withSuccess('Please login to access the dashboard page.');
    }
}
?>