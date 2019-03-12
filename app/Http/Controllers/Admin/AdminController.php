<?php

namespace App\Http\Controllers\Admin;
use App\AdvertisementCount;
use App\Http\Controllers\Controller;
use App\RestaurantList;
use App\User;
use Auth;

use DB;
use Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Mail;
use Redirect;
use Session;
use View;
use Crypt;
use App\Advertisement;
use App\Doctor;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    public function index(Request $request)
    {

    }
    
    public function adupload()
    {
      
      return view('admins.ad_genre');

    }
    
  public function uploadTopic(Request $request)
    {
        $input = $request->all();
        
        Topic::create($input);
        
        return redirect('admin/genre_list');
    }

    public function login(Request $request)
    {
        if ((Auth::user())) {
            return redirect()->intended(route('admins.user_list'));
        } else {
            if ($request->isMethod('post')) {
                $rule = $this->validate($request, [
                    'email'    => 'required|email|max:190',
                    'password' => 'required|max:190',
                ]);

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => '1'], $request->remember)) {
                    return redirect('admin/user_list');
                } 
                else {
                $request->session()->flash('alert-danger', 'Wrong Credentials ');
                return redirect('/admin/login');
                }
            }
            return view('admins.login');
        }

    }


 public function privacy(Request $request)
 {
  
    return view('admins.privacy');
 }


    public function changeStatus($id)
    {

        $user = User::find($id);

        if($user->admin_status == "0"){
            $user->admin_status = "1";
        } else {
            $user->admin_status = "0";
        }

        $user->save();

        return back();
    }

    public function changeStatusad($id)
    {

        $ad = Advertisement::find($id);

        if($ad->status == "0"){
            $ad->status = "1";
        } else {
            $ad->status = "0";
        }

        $ad->save();

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function user_list(Request $request)
    {
        if (is_null(Auth::user())) {
            return redirect()->intended(route('admins.login'));
        } else {
            $obj   = new CommonAdminController;
            $users = User::where('is_admin', '0')->orderBy('id', 'DESC')->get();
            foreach ($users as $user) {
                if(empty($user->image)){
                $user->image = url('/public/img/user-default.png');
                }
                $user->created_on = date("dFY", strtotime($user->created_at));
            }


            return view('admins.user_list', compact('users'));
        }
    }


 public function help(Request $request)
    {
        if (is_null(Auth::user())) {
            return redirect()->intended(route('admins.login'));
        } else {
            $obj   = new CommonAdminController;
            
            $users=DB::select('select * from helps');
            foreach ($users as $user) {
                if(empty($user->image)){
                $user->image = url('/public/img/user-default.png');
                }
                $user->created_on = date("dFY", strtotime($user->created_at));
            }
            return view('admins.help', compact('users'));
        }
    }

    
    public function ad_list(Request $request)
    {
        if (is_null(Auth::user())) {
            return redirect()->intended(route('admins.login'));
        } else {
            $obj   = new CommonAdminController;

            $users =  DB::table('screen_adds')->select('*')->orderBy('id', 'DESC')->get();
            foreach ($users as $user) {
                if(empty($user->image)){
                $user->image = url('/public/img/user-default.png');
                }
                $user->created_on = date("dFY", strtotime($user->created_at));
            }

           
            return view('admins.ad_list', compact('users'));

        }
       

    }


  function add_screen_add(Request $request)
  {
    error_reporting(0);
    if (is_null(Auth::user())) {
            return redirect()->intended(route('admins.login'));
        } else { 
      return view('admins.add_screen');  

        }  

}


    public function inert_ad(Request $request){
    $user_id=10;  

 if (is_null(Auth::user())) {
            return redirect()->intended(route('admins.login'));
        } else { 

       $hidden_id=$request->input('hidden_id');
       $hidden_image=$request->input('hidden_image');

    if(empty($hidden_image))
    {
        $this->validate($request,[       
         'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000'
      ]); 
    }
    
     if($request->hasFile('image')) 
          {
             $image = $request->file('image');
             $name = md5($user_id.time()).rand(1000,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/adds');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
           
           }
       
       
       error_reporting(0);
       if(!empty($hidden_image) and empty($image) and !empty($hidden_id)){
     $data=array('image'=>$hidden_image,'status'=>'InActive','created_at'=>now(),'updated_at'=>now());
      DB::table('screen_adds')->where('id',$hidden_id)->update($data);
        Session::flash('message', 'Data updated successfully');    
       
       }
       
    if(!empty($hidden_image) and !empty($image) and !empty($hidden_id)){
   $data=array('image'=>$name,'status'=>'InActive','created_at'=>now(),'updated_at'=>now());
        DB::table('screen_adds')->where('id',$hidden_id)->update($data);
       Session::flash('message', 'Data updated successfully'); 
       }

     if(empty($hidden_id))
     {
      $data=array('image'=>$name,'status'=>'InActive','created_at'=>now(),'updated_at'=>now());
       DB::table('screen_adds')->insert($data);
         Session::flash('message', 'Data add successfully');   
     }
      return redirect('admin/ad_list');
        } 
    }  

  public function delete_ad(Request $request)
  {
    $id=$_POST['id'];
   DB::table('screen_adds')->where('id',$id)->delete(); 
  }

    public function edit_data(Request $request,$id)
    {
 if (is_null(Auth::user())) {
            return redirect()->intended(route('admins.login'));
        } else { 

  $user = DB::table('screen_adds')->where('id', $id)->first();
      //$user='rajeev';
      return view('admins.add_screen',compact('user'));
        }
    }  
  
   public function fetch_status(Request $request)
   {
            $id=$_POST['id'];
            $ad_value=$_POST['ad_value'];
            $status=$_POST['status'];
       
        if($ad_value=='user')
        {
         DB::update('update users set status = ? where id = ?',[$status,$id]);   
        }
        else
        {
    DB::update('update screen_adds set status = ? where id = ?',[$status,$id]);
        }
        

   }
  
    public function common_delete($id,$table)
    {
       
            DB::table($table)->where('id', $id)->delete();
            return back();
           
    }

    
    public function profile(Request $request)
    {
         $user_id=10;
        error_reporting(0);   

        if (is_null(Auth::user())) {
            return redirect()->intended(route('admins.login'));
        } else {
            $admin = User::where("is_admin", "1")->first();

            if ($request->isMethod('post')) {
                $rule = $this->validate($request, [
                    'email'    => 'required|email|max:190',
                    //'password' => 'required|max:190',
                    'name'     => 'required|max:190',
                    'image'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                ]);
              
    
        if($request->hasFile('image')) 
          {

            $image = $request->file('image');
            $name = md5($user_id.time()).rand(1000,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/view_profile');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            
           }
       
            $hidden_image=$request->input('hidden_image');
             if(!empty($hidden_image))
             {
             $update = array(
                    'email'       => $request->email,
                    'name'        => $request->name,
                    'image'        =>$hidden_image,
                );

           if (User::where('id', $admin->id)->update($update)) {
                    $request->session()->flash('success', 'Profile update successfully!');
                    Session::flash('message', 'Profile updated successfully'); 
                  //Session::flash('alert-class', 'alert-danger'); 
                    return redirect('/admin/profile');
                } else {
               Session::flash('message', 'Profile updated successfully');
                }


             }
        else
            {
       
               $update1 = array(
                    'email'       => $request->email,
                    'name'        => $request->name,
                    'image'        =>$name,
                );


                if (User::where('id', $admin->id)->update($update1)) {
                    $request->session()->flash('success', 'Profile update successfully!');
                    return redirect('/admin/profile');
                } else {
                $request->session()->flash('alert-danger', 'Internal error .');
                }
             }
                
       

                if (User::where('id', $admin->id)->update($update)) {
                    $request->session()->flash('success', 'Profile update successfully!');
                    return redirect('/admin/profile');
                } else {
                $request->session()->flash('alert-danger', 'Internal error .');
                }
            } 
            else {
                return view('admins.profile', compact('admin'));
            }
        }

    }

    
    public function forgot_password(Request $request)
    {

        try {
            if (Auth::user()) {
                return redirect()->intended(route('admins.user_list'));
            } elseif ($request->isMethod('post')) {
                $this->validate($request, [
                    'email' => 'required|email',
                ]);
            $create = User::where('is_admin', '1')->where('email', $request->email)->first();
                if (!empty($create)) {
                    $password                = $create->confirm_password; //mt_rand(10000, 99999);
                    $create->password        = Hash::make($password);
                    $create->confirm_password = $password;
                    if ($create->save()) {
                        $email   = $create->email;
                        $subject = "New Password";
                        
                        $message="send message";
if (!empty($email)) 
{

   Mail::send('emails.forgotPassword', ['password' => $password,'email' => $create->email], function ($message) use ($email, $subject) {
                            $message->to($email)->subject($subject);
                        });

    $request->session()->flash('alert-success', 'Password send to your mail');
    return redirect('/admin/login');

    }

                         else {
                            $request->session()->flash('alert-danger', 'Fail to send.');
                            return redirect('/admin/forgot_password');
                        }

                    } else {
                        $request->session()->flash('alert-success', 'Internal Server Error');
                    }
                } else {
                    $request->session()->flash('alert-danger', 'Not a valid user.');
                }
                return Redirect::back();
            } else {
                return view('admins.forgot_password');
            }

        } catch (Exception $e) {

        }
    }

    public function change_user_status(Request $request){
        $id = Crypt::decrypt($request->id);
    }
     

}
