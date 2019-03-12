<?php

namespace App\Http\Controllers\API;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\User;
use App\Token;
use Validator;
use Image;
use Intervention\Image\ImageServiceProvider;
use DB;
use App\Video;
use App\Hashtag;
use App\Category;
use App\Follower;
use Illuminate\Support\Facades\Input;
use App\Rating;
use App\Mail\SendMailable;
USE App\Fametalerating;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\Doctor;
use App\Dtoken;
use Session;
use App\Specialty;
use App\Post;
use App\Like;
use App\Savepost;
use Carbon\Carbon;
use App\Comment;

class HomeAPIController extends APIBaseController
{
    //

    public function index()
    {
        $postlist = $this->newsfeedlist();

        $all_name_cities = DB::table('cities')->select('id','name')->get()->toArray();

        return view('index',compact('postlist','all_name_cities'));
    }

    public function filterlisting(Request $request)
    {
      $city_list = DB::table('cities')->select('id','name')->get()->toArray();
      $specialties_list = DB::table('specialties')->select('id','name')->get()->toArray(); 
      $name_list = DB::table('doctors')->select('id','fullname')->get()->toArray();
      $clinic_list = DB::table('doctors')->select('id','clinic as fullname')->get()->toArray();

      $name_list1 = array_merge($name_list,$clinic_list);

       $input = $request->all();

       $query_part = "";

       if(!empty($input['city_id']))
       {
            if($input['city_id'] == '0'){
                 $request->session()->put('city_id','');
            } else {
                 $request->session()->put('city_id',$input['city_id']);
            }
       } 

       if(!empty($input['search_name']))
       {
             if($input['search_name'] == '0'){
                $request->session()->put('search_name','');
            } else {
                 $request->session()->put('search_name',$input['search_name']);
            }
            
       }

       if(!empty($input['speciality_id']))
       {
             if($input['speciality_id'] == '0'){
                $request->session()->put('speciality_id','');
            } else {
                 $request->session()->put('speciality_id',$input['speciality_id']);
            }
            
       } 

       //dd($request->session()->get('city_id'));

        if(!empty($request->session()->get('city_id'))){
            if(!empty($request->session()->get('speciality_id'))){
                $query_part = "doctors.`speciality_id`='".$request->session()->get('speciality_id')."' and doctors.`city_id`='".$request->session()->get('city_id')."'";

                
            } else {
                $query_part = "doctors.`city_id`='".$request->session()->get('city_id')."'";
            }

             
             
        } else {
            if(!empty($request->session()->get('speciality_id'))){
                $query_part = "doctors.`speciality_id`='".$request->session()->get('speciality_id')."'";
                 
            } else {
                $query_part = "";
            }
        }

        if(!empty($request->session()->get('search_name'))){
            if(empty($query_part) || $query_part == ''){
                $query_part = " doctors.`fullname`='".$request->session()->get('search_name')."' or doctors.`clinic`='".$request->session()->get('search_name')."'";
            } else {
                $query_part = $query_part." and (doctors.`fullname`='".$request->session()->get('search_name')."' or doctors.`clinic`='".$request->session()->get('search_name')."')";
            }

             
        }

        if(!empty($query_part)){
            $query_part = " where ".$query_part;
        }

        $recorde_detail = DB::select("SELECT doctors.fullname,doctors.id as user_id,doctors.clinic,doctors.avilability,doctors.image,specialties.name as speciality_name,cities.name as city_name FROM `doctors` inner join cities on (cities.id=doctors.city_id) inner JOIN specialties on (specialties.id=doctors.speciality_id)".$query_part);

        foreach ($recorde_detail as $value) {
            //dd($value->image);
            if(empty($value->image)){
                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
            } else {
                $value->image = url('/').'/public/'.$value->image;
            }

            $value->fee = "100";

            $value->rating = "100";
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

             $itemCollection = collect($recorde_detail);
     
            // Define how many items we want to be visible in each page
            $perPage = 6;
     
            // Slice the collection to get the items to display in current page
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
     
            // Create our paginator and pass it to the view
            $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
     
            // set url path for generted links
            $paginatedItems->setPath($request->url());

      return view('filter_listing',['items' => $paginatedItems,'city_list'=>$city_list,'specialties_list'=>$specialties_list,'name_list1'=>$name_list1]);
    }

    public function subscription()
    {
    	return view('subscription');
    }

    public function usermore(Request $request)
    {
    	 if(SESSION::get('userdetails', 'default') == 'default'){

              return redirect('userlogin');
        } else {
		    	$savepostlist = $this->savepostlist();

		    	$currentPage = LengthAwarePaginator::resolveCurrentPage();

		         $itemCollection = collect($savepostlist);
		 
		        // Define how many items we want to be visible in each page
		        $perPage = 9;
		 
		        // Slice the collection to get the items to display in current page
		        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
		 
		        // Create our paginator and pass it to the view
		        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
		 
		        // set url path for generted links
		        $paginatedItems->setPath($request->url());

		    	return view('usermore',['items' => $paginatedItems]);
    	}
    }

    public function doctormore(Request $request)
    {
    	 if(SESSION::get('userdetails', 'default') == 'default'){

              return redirect('doctorlogin');
        } else {
		    	$savepostlist = $this->savepostlist();

		    	$currentPage = LengthAwarePaginator::resolveCurrentPage();

		         $itemCollection = collect($savepostlist);
		 
		        // Define how many items we want to be visible in each page
		        $perPage = 9;
		 
		        // Slice the collection to get the items to display in current page
		        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
		 
		        // Create our paginator and pass it to the view
		        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
		 
		        // set url path for generted links
		        $paginatedItems->setPath($request->url());

		        return view('doctormore',['items' => $paginatedItems]);
		}
    }

     public function savepostlist()
    {
        
         if(SESSION::get('userdetails', 'default') == 'default'){

            $id = "";
            $input['usertype'] = "user";
        } else {
              $id = SESSION::get('userdetails', 'default')->id;
            $input['usertype'] = SESSION::get('userdetails', 'default')->usertype;
        }

       
            $get_news_feedlist = DB::select("select posts.usertype as ignuser,posts.user_id as ignuserid, posts.id as post_id,posts.title,posts.url,posts.description,posts.created_at from saveposts inner join posts on (posts.id = saveposts.post_id) where saveposts.user_id ='".$id."' and saveposts.usertype='".$input['usertype']."' order by post_id desc");


         foreach ($get_news_feedlist as $value) {

            $value->shareurl = url('/')."/postpage/".Crypt::encryptString($value->post_id);

            
            $userlist = DB::table($value->ignuser."s")->where('id',$value->ignuserid)->first();
           
            $value->fullname = $userlist->fullname;
            if(empty($userlist->image)){
                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
            } else {
                 $value->image = url('/public/').'/'.$userlist->image;
            }

            if(empty($value->post_image)){
                $value->post_image = "";
            } else {
                $value->post_image = url('/public/').'/'.$value->post_image;
            }

            if($value->ignuser == 'user')
            {
               $value->speciality_name = ""; 
            } else {
            	$spl_name_by_id = DB::table('specialties')->where('id',$userlist->speciality_id)->first();

            	$value->speciality_name = $spl_name_by_id->name;

            }

        
           
        }

        //dd($return_array);
        return $get_news_feedlist;

    }

    public function likepost($post_id)
    {
       
        if(SESSION::get('userdetails', 'default') == 'default'){

                echo url('/userlogin').'_'."0";

                die();

        } else {
            $input['user_id'] = SESSION::get('userdetails', 'default')->id;
            $input['usertype'] = SESSION::get('userdetails', 'default')->usertype;
            $input['post_id'] = Crypt::decryptString($post_id);

        $like_recorde = DB::table('likes')->where(['user_id'=>$input['user_id'],'post_id'=>$input['post_id'],'usertype'=>$input['usertype']])->first();

        if(empty($like_recorde))
        {
                if($input['usertype'] == 'user')
        {
            $post = User::find($input['user_id']);


            if (is_null($post)) {
                

                echo "User not found."."_"."1";
                die();
            }


            $like_colmn = Like::create($input);
             
            echo "Post liked successfully!!"."_"."1"."_"."1";
                die();


        } else if($input['usertype'] == 'doctor')
        {
           $post = Doctor::find($input['user_id']);


            if (is_null($post)) {
               
                
                 echo "Doctor not found!!"."_"."1";
                die();
            }

            $like_colmn = Like::create($input);  

             echo "Post liked successfully!!"."_"."1"."_"."1";
                die();
        }
        } else {
            
            DB::table('likes')->where(['user_id'=>$input['user_id'],'post_id'=>$input['post_id'],'usertype'=>$input['usertype']])->delete();

           
                 echo "Post unliked successfully!!"."_"."1"."_"."0";
                die();
            
        }

        }


    }

    public function savepost($post_id)
    {
        if(SESSION::get('userdetails', 'default') == 'default'){

                echo url('/userlogin').'_'."0";

                die();

        } else {
            $input['user_id'] = SESSION::get('userdetails', 'default')->id;
            $input['usertype'] = SESSION::get('userdetails', 'default')->usertype;
            $input['post_id'] = Crypt::decryptString($post_id);

        $saveposts_recorde = DB::table('saveposts')->where(['user_id'=>$input['user_id'],'post_id'=>$input['post_id'],'usertype'=>$input['usertype']])->first();

        if(empty($saveposts_recorde))
        {
            if($input['usertype'] == 'user')
            {
                $post = User::find($input['user_id']);


                if (is_null($post)) {
                  echo "User not found."."_"."1";
                die();
                }

                $Savepost_colmn = Savepost::create($input);
                echo "Post save successfully!!"."_"."1"."_"."1";
                die();


            } else if($input['usertype'] == 'doctor')
            {
               $post = Doctor::find($input['user_id']);


                if (is_null($post)) {
                   
            	    echo "Doctor not found!!"."_"."1";
                	die();
                }

                $Savepost_colmn = Savepost::create($input);  

                  	echo "Post save successfully!!"."_"."1"."_"."1";
                	die();
            }
        } else {

            DB::table('saveposts')->where(['user_id'=>$input['user_id'],'post_id'=>$input['post_id'],'usertype'=>$input['usertype']])->delete();


            
                 echo "Post unsave successfully!!"."_"."1"."_"."0";
                die();
           
        }


      }

        


    }

    public function newsfeedlist()
    {
        
        if(SESSION::get('userdetails', 'default') == 'default'){

            $input['user_id'] = "";
            $input['usertype'] = "user";
        } else {
             $input['user_id'] = SESSION::get('userdetails', 'default')->id;
            $input['usertype'] = SESSION::get('userdetails', 'default')->usertype;
        }
  

        $get_news_feedlist = DB::select("select * from(SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`doctors`.`fullname`,`doctors`.`image`,`posts`.`id` as post_id, `specialties`.`name` as speciality_name,`posts`.`image` as post_image,'doctor' as usertype FROM `posts` inner join `doctors` on (`posts`.`user_id`=`doctors`.`id`) inner join `specialties` on (`specialties`.`id`=`doctors`.`speciality_id`)   where `posts`.`usertype`='doctor' 
union all
SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`users`.`fullname`,`users`.`image` as user_image,`posts`.`id` as post_id, '' as speciality_name,`posts`.`image` as post_image,'user' as usertype FROM `posts` inner join `users` on (`posts`.`user_id`=`users`.`id`) where `posts`.`usertype`='user') as x order by x.post_id desc");

        

        foreach ($get_news_feedlist as $value) {

            $value->shareurl = url('/')."/postpage/".Crypt::encryptString($value->post_id);

             if(empty($value->image)){
                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
            } else {
                 $value->image = url('/public/').'/'.$value->image;
            }

            if(empty($value->post_image)){
                $value->post_image = "";
            } else {
                $value->post_image = url('/public/').'/'.$value->post_image;
            }

            $like_recorde = DB::table('likes')->where(['user_id'=>$input['user_id'],'post_id'=>$value->post_id,'usertype'=>$input['usertype']])->first();

            if(empty($like_recorde))
            {
                $value->likeflag = "0";
            } else {
                $value->likeflag = "1";
            }

            $saveposts_recorde = DB::table('saveposts')->where(['user_id'=>$input['user_id'],'post_id'=>$value->post_id,'usertype'=>$input['usertype']])->first();

            if(empty($saveposts_recorde))
            {
                $value->saveflag = "0";
            } else {
                $value->saveflag = "1";
            }
        }

        $get_news_feedlist;
       // unset($return_array['id']);
        //unset($return_array['image']);
       // $return_array['post_id'] = (string)$get_news_feedlist['id'];
        


       return $get_news_feedlist;
    }


    public function newsfeedlist_ui(Request $request)
    {
        $postlist = $this->newsfeedlist();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

         $itemCollection = collect($postlist);
 
        // Define how many items we want to be visible in each page
        $perPage = 9;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());

        return view('newsfeedlist',['items' => $paginatedItems]);
    }


   public function specialty(Request $request)
   {
        $all_name = DB::table('specialties')->select('id','name')->where('remark','1')->get();
        
        $retrun_array['specialties'] = $all_name;

        return $this->sendResponse($retrun_array, 'Specialties retrieve successfully.',$request->path());
   }

   public function specialty_all(Request $request)
   {
        $all_name = DB::table('specialties')->select('id','name')->whereNotIn('id',['7'])->get();
        
        $retrun_array['specialties'] = $all_name;

        return $this->sendResponse($retrun_array, 'Specialties list retrieve successfully.',$request->path());
   }

  
   
   public function forgotpass(Request $request)
   {
      $input = $request->all();

   	  $user = User::where('email',$input['email'])->get()->toArray();
   	  
   	  if(empty($user))
   	  {
   	     
   	      return $this->sendError($request->path(),'Email does not exist');	
   	  	
   	  }
      $msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("pratap11191@gmail.com","My subject",$msg);

     

      $retrun_array['status'] = 'success';

     return $this->sendResponse($retrun_array, 'email successfully send',$request->path());
   
   }

   public function postpage(Request $request,$id)
   {

      $post_id = Crypt::decryptString($id);

      $get_news_feedlist = DB::select("select * from(SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`doctors`.`fullname`,`doctors`.`image`,`posts`.`id` as post_id, `specialties`.`name` as speciality_name,`posts`.`image` as post_image,'doctor' as usertype FROM `posts` inner join `doctors` on (`posts`.`user_id`=`doctors`.`id`) inner join `specialties` on (`specialties`.`id`=`doctors`.`speciality_id`)   where `posts`.`usertype`='doctor' 
union all
SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`users`.`fullname`,`users`.`image` as user_image,`posts`.`id` as post_id, '' as speciality_name,`posts`.`image` as post_image,'user' as usertype FROM `posts` inner join `users` on (`posts`.`user_id`=`users`.`id`) where `posts`.`usertype`='user') as x where x.post_id = '".$post_id."'");

       $return_array1 = DB::select("select * from(SELECT comments.id as comment_id,users.image,users.fullname,users.email,comments.message,comments.created_at FROM `comments` inner join `users` on (users.id = comments.user_id) where comments.`usertype` = 'user' and comments.post_id ='".$post_id."'
            union ALL
            SELECT comments.id as comment_id,doctors.image,doctors.fullname,doctors.email,comments.message,comments.created_at FROM `comments` inner join `doctors` on (doctors.id = comments.user_id) where comments.`usertype` = 'doctor' and comments.post_id ='".$post_id."') as x order by x.comment_id DESC");


         foreach ($return_array1 as $value) {
             if(empty($value->image)){
                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
            } else {
                 $value->image = url('/public/').'/'.$value->image;
            }

             $value->created_at = Carbon::parse($value->created_at)->diffForHumans();
        }


      $retrun_array = $get_news_feedlist[0];
      
      return view('postdescription',compact('retrun_array','return_array1'));
   }


   public function postnews(Request $request)
    {
       
        $input = $request->all();

      $input['user_id'] = SESSION::get('userdetails', 'default')->id;
      $input['usertype'] = SESSION::get('userdetails', 'default')->usertype;

        if(empty($input['url'])){
             $input['url'] = "";
        }

       

        if($input['usertype'] == 'user')
        {
             $post = User::find($input['user_id']);


        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $name = md5($input['user_id'].time()).rand(1000,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/postimage');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $input['image'] = 'postimage/'.$name;
        }

        $newpost = Post::create($input);
        $return_array = $newpost->toArray();

        unset($return_array['id']);
        $return_array['post_id'] = (string)$newpost->toArray()['id'];

        if(empty($return_array['image'])){
           $return_array['image'] = ""; 
        } else {
           
           $return_array['image'] = url('/public/').'/'.$newpost->toArray()['image'];
        }
        
        
       return back();


        } else if($input['usertype'] == 'doctor')
        {
             $post = Doctor::find($input['user_id']);

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $name = md5($input['user_id'].time()).rand(1000,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/postimage');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $input['image'] = 'postimage/'.$name;
        }

        

        $newpost = Post::create($input);

        $return_array = $newpost->toArray();

        unset($return_array['id']);
        //unset($return_array['image']);
        $return_array['post_id'] = (string)$newpost->toArray()['id'];
        $return_array['image'] = url('/public/').'/'.$newpost->toArray()['image'];
        return back();
        }






    }

 
    public function usersignup(Request $request)
   {
     

      if ($request->isMethod('post')){

        $input = $request->all();

        $val_arr = [
            'fullname' => 'required|max:25',
            'phone' => 'required|phone_country:UAE',
            'email'=>'required',
            'password' => 'required|confirmed|min:6',
        ];


        

        $validator = Validator::make($input, $val_arr);


        if($validator->fails()){
            //return $this->sendError($request->path(),$validator->errors()->first());  

            //dd(); 
            $messages =$validator->errors()->toArray();

            //dd($messages['fullname']['0']);

            return view('usersignup',compact('messages'));    
        }

        $details = User::create($input);


        $token_s = str_random(25);


        $tokens_array = array('user_id'=>$details->id,'token'=>$token_s,'deviceType'=>'website','deviceToken'=>$_SERVER['SERVER_ADDR']);

        $token_saver = Token::create($tokens_array);

        $details->token = $token_s;

         $details->usertype = 'user';
        session(['userdetails' => $details]);

        return redirect('userprofile');
        
      }
       else {
         return view('usersignup');
      }
      

   }

   public function logout(Request $request)
   {
      $request->session()->flush();

     // dd($request->session()->get('userdetails', 'default'));

      return redirect('/');
   }

   public function userlogin(Request $request)
   {
        if ($request->isMethod('post')){

          $input = $request->all();

            $val_arr = [
            'email'=>'required',
            'password' => 'required',
        ];


        

        $validator = Validator::make($input, $val_arr);


        if($validator->fails()){
          
            $messages =$validator->errors()->toArray();

          

            return view('userlogin',compact('messages'));    
        }

         $details = User::where(['password'=>$input['password'],'admin_status'=>'1'])->whereRaw(" phone = '".$input['email']."' or email = '".$input['email']."'")->first();

        if (empty($details)) {
            $messages1 = "password or email is incorrect";
            return view('userlogin',compact('messages1'));
        }

        $token_s = str_random(25);


        $token_saver = Token::where('user_id',$details['id'])->update(['token'=>$token_s,'deviceToken'=>$_SERVER['SERVER_ADDR'],'deviceType'=>'website']);


         $details->token = $token_s;

         $details->usertype = 'user';

        session(['userdetails' => $details]);

        return redirect('userprofile');

        } else {
            return view('userlogin');
        }
   }


   public function doctorlogin(Request $request)
   {
        if ($request->isMethod('post')){

          $input = $request->all();

            $val_arr = [
            'email'=>'required',
            'password' => 'required',
        ];


        

        $validator = Validator::make($input, $val_arr);


        if($validator->fails()){
          
            $messages =$validator->errors()->toArray();

          

            return view('doctorlogin',compact('messages'));    
        }

         $details = Doctor::where(['password'=>$input['password'],'admin_status'=>'1'])->whereRaw(" phone = '".$input['email']."' or email = '".$input['email']."'")->first();

        if (empty($details)) {
            $messages1 = "password or email is incorrect";
            return view('userlogin',compact('messages1'));
        }

        $token_s = str_random(25);


        $token_saver = Dtoken::where('user_id',$details['id'])->update(['token'=>$token_s,'deviceToken'=>$_SERVER['SERVER_ADDR'],'deviceType'=>'website']);


         $details->token = $token_s;

         $specialties_name = DB::table('specialties')->where('id',$details->speciality_id)->first();

         $city_name = DB::table('cities')->where('id',$details->city_id)->first();

         $details->city_name = $city_name->name;

          $details->specialties_name = $specialties_name->name;

          $details->usertype = 'doctor';

        session(['userdetails' => $details]);



        return redirect('doctorprofile');

        } else {
            return view('doctorlogin');
        }
   }


   public function doctorsignup(Request $request)
   {
     
     $all_name = DB::table('specialties')->select('id','name')->where('remark','1')->get()->toArray();

     $all_name_cities = DB::table('cities')->select('id','name')->get()->toArray();

      if ($request->isMethod('post')){

        $input = $request->all();

        $val_arr = [
            'email' => 'required',
            'speciality_id' => 'required',
            'clinic'=>'required',
            'licence_number'=>'required',
            'expertise_area'=>'required',
            'password' => 'required|confirmed|min:6',
            'fullname'=>'required|max:25',
        ];


        

        $validator = Validator::make($input, $val_arr);


        if($validator->fails()){
            //return $this->sendError($request->path(),$validator->errors()->first());  

            //dd(); 
            $messages =$validator->errors()->toArray();

            //dd($messages['fullname']['0']);

            return view('doctorsignup',compact('messages','all_name'));    
        }

        if(!empty($input['the_other_speciality']) && isset($input['the_other_speciality'])){
                    $spl_new_entry = array('name'=>$input['the_other_speciality']);
                    $Specialty_record = Specialty::create($spl_new_entry);
                    $input['speciality_id'] = (string)$Specialty_record->id;
        }

        $details = Doctor::create($input);


        $token_s = str_random(25);


        $tokens_array = array('user_id'=>$details->id,'token'=>$token_s,'deviceType'=>'website','deviceToken'=>$_SERVER['SERVER_ADDR']);

        $token_saver = Dtoken::create($tokens_array);

        $details->token = $token_s;

        $details->usertype = 'doctor';


        session(['userdetails' => $details]);

        return redirect('doctorprofile');
        
      }
       else {
         return view('doctorsignup',compact('all_name','all_name_cities'));
      }
      

   }

   public function changePassword(Request $request)
    {
        $input = $request->all();

        $val_arr = [
            'oldpassword'=>'required',
            'password' => 'required|confirmed|min:6',
            'usertype'=>'required',
            'user_id'=>'required',
        ];

         $input['user_id'] = Crypt::decryptString($input['user_id']);

        $validator = Validator::make($input, $val_arr);


        if($validator->fails()){

        	Session::flash('message_passchange', $validator->errors()->first()); 

                  unset($_POST);

               return back();
              
        }


        if($input['usertype'] == 'user')
        {
            $post = User::find($input['user_id']);


            if (is_null($post)) {
               
                 Session::flash('message_passchange', 'User not found.'); 

                  unset($_POST);

               return back();
            }

            

            if($post->password != $input['oldpassword'])
            {
                return $this->sendError($request->path(),'');
                 Session::flash('message_passchange', 'Old Password is wrong'); 

                  unset($_POST);

               return back();
            } else {
                $post->password = $input['password'];
                $post->save();

               Session::flash('message_passchange', 'Password Changed successfully!!'); 

                unset($_POST);

                return back();
            }
        } else if($input['usertype'] == 'doctor')
        {
            $post = Doctor::find($input['user_id']);


            if (is_null($post)) {
              
                Session::flash('message_passchange', 'Doctor not found.'); 

                 unset($_POST);

               return back();
            }

             

            if($post->password != $input['oldpassword'])
            {
            	 Session::flash('message_passchange', 'Old Password is wrong!!'); 

            	  unset($_POST);

               return back();
                
            } else {
                $post->password = $input['password'];
                $post->save();

                Session::flash('message_passchange', 'Password Changed successfully!!'); 

                unset($_POST);

                return back();
                
            }
        }





    }


     public function postlistbyuserid(Request $request,$id)
    {
        

        foreach ($get_news_feedlist as $value) {

            $value->shareurl = url('/')."/postpage/".Crypt::encryptString($value->post_id);

            if(empty($value->image)){
                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
            } else {
                 $value->image = url('/public/').'/'.$value->image;
            }

            if(empty($value->post_image)){
                $value->post_image = "";
            } else {
                $value->post_image = url('/public/').'/'.$value->post_image;
            }

            $like_recorde = DB::table('likes')->where(['user_id'=>$id,'post_id'=>$value->post_id,'usertype'=>$input['usertype']])->first();

            if(empty($like_recorde))
            {
                $value->likeflag = "0";
            } else {
                $value->likeflag = "1";
            }

            $saveposts_recorde = DB::table('saveposts')->where(['user_id'=>$id,'post_id'=>$value->post_id,'usertype'=>$input['usertype']])->first();

            if(empty($saveposts_recorde))
            {
                $value->saveflag = "0";
            } else {
                $value->saveflag = "1";
            }

           
           
        }

        



        return $this->sendResponse($get_news_feedlist, 'Post list retrieve successfully',$request->path());


    }

    public function doctorprofile(Request $request)
    {

    	 

    		if(SESSION::get('userdetails', 'default') == 'default'){

    			return redirect('doctorlogin');


    		} else {

                 $city_list = DB::table('cities')->select('id','name')->get()->toArray();

    			if(SESSION::get('userdetails', 'default')->usertype == 'user')
        		{
            				$get_news_feedlist = DB::select("select * from(SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`users`.`fullname`,`users`.`image`,`posts`.`id` as post_id, '' as speciality_name,`posts`.image as post_image FROM `posts` inner join `users` on (`posts`.`user_id`=`users`.`id`) where `posts`.`usertype`='user' and `posts`.`user_id`='".SESSION::get('userdetails', 'default')->id."') as x order by x.post_id desc");
        		} else if(SESSION::get('userdetails', 'default')->usertype == 'doctor')
       		 	{
            				$get_news_feedlist = DB::select("select * from(SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`doctors`.`fullname`,`doctors`.`image`,`posts`.`id` as post_id, `specialties`.`name` as speciality_name,`posts`.image as post_image FROM `posts` inner join `doctors` on (`posts`.`user_id`=`doctors`.`id`) inner join `specialties` on (`specialties`.`id`=`doctors`.`speciality_id`)   where `posts`.`usertype`='doctor' and `posts`.`user_id`='".SESSION::get('userdetails', 'default')->id."') as x order by x.post_id desc");
        		}

        		  foreach ($get_news_feedlist as $value) {

        		  		 $value->shareurl = url('/')."/postpage/".Crypt::encryptString($value->post_id);

			            if(empty($value->image)){
			                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
			            } else {
			                 $value->image = url('/public/').'/'.$value->image;
			            }

			            if(empty($value->post_image)){
			                $value->post_image = "";
			            } else {
			                $value->post_image = url('/public/').'/'.$value->post_image;
			            }

			            $like_recorde = DB::table('likes')->where(['user_id'=>SESSION::get('userdetails', 'default')->id,'post_id'=>$value->post_id,'usertype'=>SESSION::get('userdetails', 'default')->usertype])->first();

			            if(empty($like_recorde))
			            {
			                $value->likeflag = "0";
			            } else {
			                $value->likeflag = "1";
			            }

			            $saveposts_recorde = DB::table('saveposts')->where(['user_id'=>SESSION::get('userdetails', 'default')->id,'post_id'=>$value->post_id,'usertype'=>SESSION::get('userdetails', 'default')->usertype])->first();

			            if(empty($saveposts_recorde))
			            {
			                $value->saveflag = "0";
			            } else {
			                $value->saveflag = "1";
			            }

        		  }

            if(SESSION::get('userdetails', 'default')->usertype == 'user'){
                  return redirect('userlogin');
            }   
        		return view('doctorprofile',compact('get_news_feedlist','city_list'));  	
    			
    		}
    }


    public function userprofile(Request $request)
    {

    	 

    		if(SESSION::get('userdetails', 'default') == 'default'){

    			return redirect('userlogin');


    		} else {
    			if(SESSION::get('userdetails', 'default')->usertype == 'user')
        		{
            				$get_news_feedlist = DB::select("select * from(SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`users`.`fullname`,`users`.`image`,`posts`.`id` as post_id, '' as speciality_name,`posts`.image as post_image FROM `posts` inner join `users` on (`posts`.`user_id`=`users`.`id`) where `posts`.`usertype`='user' and `posts`.`user_id`='".SESSION::get('userdetails', 'default')->id."') as x order by x.post_id desc");
        		} else if(SESSION::get('userdetails', 'default')->usertype == 'doctor')
       		 	{
            				$get_news_feedlist = DB::select("select * from(SELECT `posts`.`title`,`posts`.`url`,`posts`.`description`,`posts`.`created_at`,`doctors`.`fullname`,`doctors`.`image`,`posts`.`id` as post_id, `specialties`.`name` as speciality_name,`posts`.image as post_image FROM `posts` inner join `doctors` on (`posts`.`user_id`=`doctors`.`id`) inner join `specialties` on (`specialties`.`id`=`doctors`.`speciality_id`)   where `posts`.`usertype`='doctor' and `posts`.`user_id`='".SESSION::get('userdetails', 'default')->id."') as x order by x.post_id desc");
        		}

        		  foreach ($get_news_feedlist as $value) {

        		  		 $value->shareurl = url('/')."/postpage/".Crypt::encryptString($value->post_id);

			            if(empty($value->image)){
			                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
			            } else {
			                 $value->image = url('/public/').'/'.$value->image;
			            }

			            if(empty($value->post_image)){
			                $value->post_image = "";
			            } else {
			                $value->post_image = url('/public/').'/'.$value->post_image;
			            }

			            $like_recorde = DB::table('likes')->where(['user_id'=>SESSION::get('userdetails', 'default')->id,'post_id'=>$value->post_id,'usertype'=>SESSION::get('userdetails', 'default')->usertype])->first();

			            if(empty($like_recorde))
			            {
			                $value->likeflag = "0";
			            } else {
			                $value->likeflag = "1";
			            }

			            $saveposts_recorde = DB::table('saveposts')->where(['user_id'=>SESSION::get('userdetails', 'default')->id,'post_id'=>$value->post_id,'usertype'=>SESSION::get('userdetails', 'default')->usertype])->first();

			            if(empty($saveposts_recorde))
			            {
			                $value->saveflag = "0";
			            } else {
			                $value->saveflag = "1";
			            }

        		  }

            if(SESSION::get('userdetails', 'default')->usertype == 'doctor'){
                  return redirect('doctorlogin');
            }  
        		return view('userprofile',compact('get_news_feedlist'));  	
    			
    		}
    }



     public function editUserProfile(Request $request)
    {
        $input = $request->all();

       
        $id = SESSION::get('userdetails', 'default')->id;



        $userdetails = User::find($id);

        
        $name = "";

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $name = md5($id.time()).rand(1000,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/userimage');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $userdetails->image = 'userimage/'.$name;
        }

        
        if(!empty($_POST['email']) && isset($_POST['email'])){
            $userdetails->email = $_POST['email'];

            SESSION::get('userdetails', 'default')->email = $_POST['email']; 
        }

        if(!empty($_POST['phone']) && isset($_POST['phone'])){
            $userdetails->phone = $_POST['phone'];

            SESSION::get('userdetails', 'default')->phone = $_POST['phone']; 
        }
            
        $userdetails->save(); 

        $return_array = $userdetails->toArray();

        

        SESSION::get('userdetails', 'default')->image = $userdetails->toArray()['image'];
         

          
       return back();
        

    }


    public function commentOnPost($message,$id)
    {

       if(SESSION::get('userdetails', 'default') == 'default'){

    			echo url('/userlogin')."_"."0";
    		}
    	else {
    			$input['post_id'] = $id;

		    	$input['message'] = $message; 

		        $input['user_id'] = SESSION::get('userdetails', 'default')->id;

		        $input['usertype'] = SESSION::get('userdetails', 'default')->usertype;

		         Comment::create($input);

		          	$return_array = DB::select("select * from(SELECT comments.id as comment_id,users.image,users.fullname,users.email,comments.message,comments.created_at FROM `comments` inner join `users` on (users.id = comments.user_id) where comments.`usertype` = 'user' and comments.post_id ='".$input['post_id']."'
                union ALL
                SELECT comments.id as comment_id,doctors.image,doctors.fullname,doctors.email,comments.message,comments.created_at FROM `comments` inner join `doctors` on (doctors.id = comments.user_id) where comments.`usertype` = 'doctor' and comments.post_id ='".$input['post_id']."') as x order by x.comment_id DESC");



        			$return_string = '<label  class="cmthda" for="exampleFormControlInput1">'.sizeof($return_array).' Comments</label>';

        			 foreach ($return_array as $value) {
				             if(empty($value->image)){
				                $value->image = "https://mobulous.app/fametales/public/img/user_signup.png";
				            } else {
				                 $value->image = url('/public/').'/'.$value->image;
				            }

				             $value->created_at = Carbon::parse($value->created_at)->diffForHumans();

				             $return_string = $return_string.'<div class="notiftabs">
											<div class=" userpic">
												<img src="'.$value->image.'">
											</div>
											
											<div class="usernotify">
											<label  class="cmthda usernamedoci">'.ucfirst($value->fullname).'</label>
											<p>'.ucfirst($value->message).'</p> 
											<span class="notifytimes commentdays">'.$value->created_at.'</span>
												
											</div>	
									</div>';
        				}

        				//echo "<pre>"; print_r($return_string); die();
        				echo $return_string."_"."1";

          				die();

    		}


    }


    public function editDoctorProfile(Request $request)
    {
        if(SESSION::get('userdetails', 'default') == 'default'){

                return redirect('doctorlogin');
            }
        else {

            $input = $request->all();

             $id = SESSION::get('userdetails', 'default')->id;

             $doctors_d = Doctor::find($id);

             if(isset($input['avilability']) && !empty($input['avilability'])){
                $doctors_d->avilability = implode(",", $input['avilability']);

                SESSION::get('userdetails', 'default')->avilability = implode(",", $input['avilability']);
             }

             if ($request->hasFile('image')) 
                {
                    $image = $request->file('image');
                    $name = md5($id.time()).rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/userimage');
                    $imagePath = $destinationPath. "/".  $name;
                    $image->move($destinationPath, $name);
                    $doctors_d->image = 'userimage/'.$name;
                }

             $doctors_d->city_id = explode(",",$input['city_id'])[0];

             $doctors_d->clinic = $input['clinic'];

             $doctors_d->save();

             SESSION::get('userdetails', 'default')->city_name = explode(",",$input['city_id'])[1];

             SESSION::get('userdetails', 'default')->city_id = explode(",",$input['city_id'])[0];

             SESSION::get('userdetails', 'default')->clinic = $input['clinic'];

             if(!empty($doctors_d->image))
             {
                
                SESSION::get('userdetails', 'default')->image = $doctors_d->image;
             }

             return back();


        }

    }





}
