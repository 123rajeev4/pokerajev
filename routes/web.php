<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','API\HomeAPIController@index');

route::get('postpage/{id}','API\HomeAPIController@postpage');

route::any('usersignup','API\HomeAPIController@usersignup');

route::any('logout','API\HomeAPIController@logout');

route::any('editDoctorProfile','API\HomeAPIController@editDoctorProfile');

Route::get('newsfeedlist','API\HomeAPIController@newsfeedlist_ui');

Route::get('likepost/{post_id}','API\HomeAPIController@likepost');

Route::get('savepost/{post_id}','API\HomeAPIController@savepost');

route::any('doctorprofile','API\HomeAPIController@doctorprofile');

route::any('userprofile','API\HomeAPIController@userprofile');

route::any('userlogin','API\HomeAPIController@userlogin');

route::any('doctorlogin','API\HomeAPIController@doctorlogin');

route::any('doctorsignup','API\HomeAPIController@doctorsignup');

route::any('usermore','API\HomeAPIController@usermore');

route::any('doctormore','API\HomeAPIController@doctormore');

route::get('savepostlist','API\HomeAPIController@savepostlist');

route::any('subscription','API\HomeAPIController@subscription');

route::post('changePassword','API\HomeAPIController@changePassword');

         


route::get('aboutus',function(){
	return view('aboutus');
});

route::any('editUserProfile','API\HomeAPIController@editUserProfile');

route::any('commentOnPost/{message}/{id}','API\HomeAPIController@commentOnPost');

route::post('postnews','API\HomeAPIController@postnews');

route::any('listing','API\HomeAPIController@filterlisting');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@login')->name('admins.login');
    Route::get('login', 'AdminController@login')->name('admins.login');
    Route::post('login', 'AdminController@login')->name('admins.login');
    Route::get('logout', 'AdminController@logout');
Route::get('user_list', 'AdminController@user_list')->name('admins.user_list');

Route::get('help', 'AdminController@help')->name('admins.help');


Route::get('privacy','AdminController@privacy'); 
    
    Route::get('genre_list', 'AdminController@genre_list')->name('admins.genre_list');
    Route::get('video_list', 'AdminController@video_list')->name('admins.video_list');
    Route::get('ad_list', 'AdminController@ad_list')->name('admins.ad_list');
    Route::get('add_screen', 'AdminController@add_screen_add')->name('admins.add_screen_add');


    Route::any('inert_ad', 'AdminController@inert_ad')->name('admins.inert_ad');

    Route::any('edit_ad/{id}', 'AdminController@edit_data')->name('admins.edit_data');


    Route::post('uploadTopic','AdminController@uploadTopic')->name('admins.uploadTopic');
    
    Route::get('edit_profile', 'AdminController@edit_profile');
    Route::any('common_delete/{id}/{table}', 'AdminController@common_delete');
    Route::post('common_get', 'AdminController@common_get');
    Route::any('forgot_password', 'AdminController@forgot_password');
    Route::match(array('GET','POST'),'profile', 'AdminController@profile');
    Route::post('fetch_status', 'AdminController@fetch_status');
    Route::post('delete_ad', 'AdminController@delete_ad');
    
    Route::get('edit_user_details/{id}', 'AdminController@edit_user_details');
     
    Route::post('updateuserdetails/{id}','AdminController@edit_user_details_update');
   
    Route::get('change_status/{id}', 'AdminController@changeStatus');
    Route::get('change_status_ad/{id}', 'AdminController@changeStatusad');
      
    Route::get('ad-genre','AdminController@adupload');

   
});


