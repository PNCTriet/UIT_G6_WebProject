<?php

namespace App\Http\Controllers;

use App\Models\test;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;
use App\Models\User;
use App\Exports\MoviesExport;
use App\Exports\UsersExport;
use App\Models\user_model;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class testController extends Controller
{
    public function home()
    {
        
        return view('home', [
            'heading' => 'khong phai chao',
            'res' => DB::select("SELECT movie.id,title,description,poster_link FROM movie 
                                    INNER JOIN movie_link on movie_link.id =movie.link_id
                                    ORDER BY created_at DESC
                                    LIMIT 0,10")
            


        ]);
    } 

    public function table()
    {
       
        // if (isset($msg)) {
        //     echo $msg;
        // }
        return view('tables', [
            'res' => DB::select("SELECT movie.id,title,movieCategory.name as category from movie,movieCategory
                                    WHERE movie.category_id =movieCategory.id"),
            'category' => DB::table('movieCategory')->distinct()->get(),
            'specialgroup' => DB::table('specialgroup')->distinct()->get()
        ]);
    }
    public function add_movie()
    {
        return view('addmovie', [
            'category' => DB::table('movieCategory')->distinct()->get(),
            'specialgroup' => DB::table('specialgroup')->distinct()->get()
        ]);
    }
    public function post_movie(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'movie_link' => 'required|url',
            'poster_link' => 'nullable|mimes:png,jpg,jpeg,webp',
            'episode_status' => 'required|integer'
        ]);

        if ($request->has('poster_link')) {
            $file = $request->file('poster_link'); //$file variable stores the uploaded image file

            $extension = $file->getClientOriginalExtension(); //get jpg or png of image
            $filename = time() . '.' . $extension; //file of image to store into upload directory
            $file->move('uploads/', $filename); //move $file to uploads directory with named is $filename


        }

        // insert into movie_link table
        $query_movie = DB::select(
            "SELECT * FROM movie_link
                WHERE movie_link='{$request->movie_link}' and episode_status='{$request->episode_status}' LIMIT 0,1 "
        );
        // $query_movie =DB::table('movie_link')->where('movie_link',$request->movie_link)->where('episode_status',$request->episode_status)->limit(1)->get();

        if (!$query_movie) {
            $insert_link = DB::table('movie_link')->insert([
                'movie_link' => $request->movie_link,
                'poster_link' => "uploads/{$filename}",
                'episode_status' => $request->episode_status
            ]);
        } else {

            if (File::exists("uploads/{$filename}")) {
                File::delete("uploads/{$filename}");
            }



            return Redirect::to('/add-movie')->with(['msg' => 'The Movie has been existed in the database']);
        }
        if ($insert_link) {
            $id_link = DB::table('movie_link')->where('movie_link', $request->movie_link)->where('episode_status', $request->episode_status)->distinct()->get('id');

            $insert_movie = DB::table('movie')->insert([
                'category_id' => $request->category,
                'specialgroup_id' => $request->specialgroup,
                'title' => $request->title,
                'description' => $request->description,
                'link_id' => $id_link[0]->id,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
            if ($insert_movie) {
                return Redirect::to('/add-movie')->with(['msg' => 'Movie has been created']);
            }
        }

        return Redirect::to('/add-movie')->with(['msg' => 'Insert Movie was not successful']);
    }
    public function get_movie($id)
    {
        $respose = DB::select(
            "SELECT category_id,specialgroup_id,title,description,movie_link,poster_link,episode_status FROM movie
                INNER JOIN movie_link ON link_id =movie_link.id
                WHERE movie.id={$id}
                "
        );
        return response()->json($respose);
    }

    public function update_movie(Request $request, $id)
    {
        // return Redirect::to('/tables')->with(['msg'=>'Moive has been updated']);
        try {
            $record_movie = DB::table('movie')->find($id);
            $record_link = DB::table('movie_link')->find($record_movie->link_id);
            if ($request->has('poster_link')) {
                $file = $request->file('poster_link');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move("uploads/", $filename);
                if (File::exists($record_link->poster_link)) {
                    File::delete($record_link->poster_link);
                }
                DB::table('movie_link')->where('id', $record_movie->link_id)->limit(1)->update([
                    'movie_link' => $request->movie_link,
                    'poster_link' => "uploads/{$filename}",
                    'episode_status' => $request->episode_status
                ]);
            } else {
                DB::table('movie_link')->where('id', $record_movie->link_id)->limit(1)->update([
                    'movie_link' => $request->movie_link,
                    'episode_status' => $request->episode_status
                ]);
            }

            DB::table('movie')->where('id', $record_movie->id)->limit(1)->update([
                'category_id' => $request->category,
                'specialgroup_id' => $request->specialgroup,
                'title' => $request->name_movie,
                'description' => $request->description,
                'updated_at' => NOW()
            ]);

            return Redirect::to('/tables')->with(['msg' => 'Movie has been updated']);
        } catch (\Exception $e) {
            return Redirect::to('/tables')->with(['msg' => $e->getMessage()]);
        }
    }
    public function delete_movie($id)
    {

        $id_link_1 = DB::table('movie')->find($id);
        $image = DB::table('movie_link')->find($id_link_1->link_id);

        try {
            if (File::exists($image->poster_link)) {
                File::delete($image->poster_link);
            }
            DB::table('movie')->where('id', $id)->distinct()->delete();
            DB::table('movie_link')->distinct()->delete($id_link_1->link_id);

            return Redirect::to('/tables')->with(['msg' => 'Delete was successfull']);
        } catch (\Exception $e) {
            return Redirect::to('/tables')->with(['msg' => $e->getMessage()]);
        }
    }
    public function voucher_management()
    {
        return view('voucher', [
            'res' => DB::table('voucher')->offset(0)->limit(15)->get()
        ]);
    }

    public function live_search_voucher(Request $request)
    {

        try {

            if ($request->has('query')) {

                $query_voucher = DB::table('voucher')->where('name', 'like', "{$request->query('query')}%")->orderBy('id')->get();
            } else {
                $query_voucher = DB::table('voucher')->limit(10)->offset(0)->orderBy('id')->get();
            }

            return response()->json(['data' => $query_voucher]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()]);
        }
    }

    public function add_voucher(Request $request)
    {
        $request->validate([
            'name_voucher' => 'required|max:255',
            'discount' => 'integer'
        ]);

        try {

            DB::table('voucher')->insert([
                'name' => $request->name_voucher,
                'code' => $request->code,
                'discount_percentage' => $request->discount,
                'status' => $request->status,
                'voucherstart_date' => NOW(),
                'voucherend_date' => NOW()

            ]);
            return Redirect::to('/voucher-management')->with(['msg' => 'Voucher was created']);
        } catch (\Exception $e) {
            return Redirect::to('/voucher-management')->with(['msg' => $e->getMessage()]);
        }
    }

    public function get_voucher($id)
    {
        $query_voucher = DB::table('voucher')->where('id', $id)->distinct()->get();
        return response()->json($query_voucher);
    }
    public function delete_voucher($id)
    {
        try {
            DB::table('voucher')->where('id', $id)->distinct()->delete();
            return Redirect::to('/voucher-management')->with(['msg' => 'Voucher was deleted']);
        } catch (\Exception $e) {
            return Redirect::to('/voucher-management')->with(['msg' => $e->getMessage()]);
        }
    }
    public function update_voucher(Request $request, $id)
    {
        try {
            DB::table('voucher')->where('id', $id)->update([
                'name' => $request->name_voucher,
                'code' => $request->code,
                'discount_percentage' => $request->discount,
                'status' => $request->status,
                'voucherstart_date' => NOW(),
                'voucherend_date' => NOW()
            ]);
            return Redirect::to('/voucher-management')->with(['msg' => 'Voucher was Update']);
        } catch (\Exception $e) {
            return Redirect::to('/voucher-management')->with(['msg' => $e->getMessage()]);
        }
    }
    public function users_management()
    {
        return view('users', [
            'res'=>DB::select(" SELECT user.id as id,name,birthday,email,role_type FROM user
            inner join user_role on user.role_id =user_role.id 
            LIMIT 0,15
            "),
            'role'=>DB::table('user_role')->get(['id','role_type'])


        ]);
    }
    public function live_search_users(Request $request)
    {

        try {

            if ($request->has('query')) {

                $query_user = DB::table('user')->where('name', 'like', "{$request->query('query')}%")->orderBy('id')->get();
            } else {
                $query_user = DB::table('user')->limit(10)->offset(0)->orderBy('id')->get();
            }

            return response()->json(['data' => $query_user]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()]);
        }
    }
    public function add_user(Request $request)
    {
        $request->validate([
            'email' => 'email:rfc,dns',
            'avartar' => 'nullable|mimes:png,jpg,jpeg,web',
            'phoneNumber' => 'integer|required'

        ]);
        try {
            if ($request->has('avartar')) {
                $file_image = $request->file('avartar');
                $file_tail = $file_image->getClientOriginalExtension();
                $file_name = time() . "." . $file_tail;
                $file_image->move('avartar/', $file_name);
            }
            DB::table('user')->insert([
                'name' => $request->fullname,
                'birthday' => $request->dayofbirth,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'address' => $request->address,
                'avartar' => "avartar/{$file_name}",
                'role_id' => $request->role_id,
                'plan_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
            return Redirect::to('/users-management')->with(['msg' => 'User was created']);
        } catch (\Exception $e) {
            return Redirect::to('/users-management')->with(['msg' => $e->getMessage()]);
        }
    }
    public function get_user($id){
        $query_user =DB::table('user')->where('id',$id)->distinct()->get();
        return response()->json($query_user);
    }
    public function update_user(Request $request,$id){
        $request->validate([
            'email'=>'email:rfc,dns',
            'avartar'=>'nullable|mimes:png,jpg,jpeg,web',
            'phoneNumber'=>'integer|required'

        ]);
        try{
            $avt =DB::table('user')->where('id',$id)->distinct()->get('avartar');//get link image
            // dd($avt[0]->avartar);
            if($request->has('avartar')){
                $file =$request->file('avartar');
                $extension =$file->getClientOriginalExtension();
                $filename =time().'.'.$extension;
                $file->move("avartar/",$filename);
                //delete old file in avartar directory
                if(File::exists($avt[0]->avartar)){
                    File::delete($avt[0]->avartar);
                }
                DB::table('user')->where('id',$id)->limit(1)->update([
                    'avartar'=>"avartar/{$filename}"
                ]);
            }
            $email =DB::table('user')->where('id',$id)->get('email');
            
            DB::table('user')->where('id',$id)->limit(1)->update([
                'name'=>$request->fullname,
                'birthday'=>$request->dayofbirth,
                'email'=>$request->email,
                'phoneNumber'=>$request->phoneNumber,
                'address'=>$request->address,
                'role_id'=>$request->role_id,
                'plan_id'=>1,
                
                'updated_at'=>NOW()
            ]);
            DB::table('users')->where('email',$email[0]->email)->update([
                'email'=>$request->email,
                'name'=>$request->fullname,
                'updated_at'=>NOW()

            ]);

            return Redirect::to('/users-management')->with(['msg'=>'User was updated']);
           

        }catch(\Exception $e){
            return Redirect::to('/users-management')->with(['msg'=>$e->getMessage()]);
        }
    }
    public function delete_user($id){
        try{
            DB::table('user')->where('id',$id)->distinct()->delete();
            return Redirect::to('/users-management')->with(['msg'=>'User was deleted']);
        }catch(\Exception $e){
            return Redirect::to('/users-management')->with(['msg'=>$e->getMessage()]);
        }
    }

    public function send_mail(){
        return view('sendMail',[
            'res'=>DB::select(" SELECT user.id as id,name,birthday,email,role_type FROM user
                                inner join user_role on user.role_id =user_role.id 
                                LIMIT 0,15
            "),
        ]);
    }

    public function mail_to(Request $request,$id){
        // if($request->has('email')){
        //     return response()->json(['email'=>$request->query('email')]);
        // }else{
        //     return response()->json(['email'=>'có cái đàu bùi']);
        // }
        $user =user_model::find($id);
        
        
       

        
        $detail=[
            'subject'=>$request->subject,
            'greeting'=>'Dear Sir',
            'content'=>$request->content

        ];
        // Notification::sendNow($data,new SendEmailNotification($detail));
        $user->notify(new SendEmailNotification($detail));
        return Redirect::to('/send-mail')->with(['msg'=>'Send Mail was successful']);
    }
    // export excel
    public function export_user(){
        return Excel::download(new UsersExport(),'users.xlsx');
    }

    public function export_movie(){
        return Excel::download(new MoviesExport(),'movies.xlsx' );
    }

};
