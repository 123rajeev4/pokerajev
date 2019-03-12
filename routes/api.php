<?php

use Illuminate\Http\Request;  

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('sendmessage','API\UserAPIController@sendmessage');

Route::post('chatpage','API\UserAPIController@chatthreadpage');

Route::post('getmsg','API\UserAPIController@getmsg');


Route::post('signup', 'API\UserAPIController@signup');            

Route::post('login', 'API\UserAPIController@login');  

Route::post('CreateGame','API\UserAPIController@CreateGame');  

Route::post('UpdateGame','API\UserAPIController@updategame'); 

Route::post('deleteGame','API\UserAPIController@deleteGame'); 

Route::post('test','API\UserAPIController@test'); 

Route::post('home','API\UserAPIController@home');         

Route::post('editUserProfile','API\UserAPIController@editUserProfile');  

Route::post('viewUserProfile','API\UserAPIController@viewUserProfile');    

Route::post('JoinGames','API\UserAPIController@JoinGames');        

Route::post('doctordetaillist','API\UserAPIController@doctordetaillist');

Route::post('updatePassword','API\UserAPIController@updatePassword');  

Route::post('sendCode','API\UserAPIController@sendCode');                

Route::get('specialty','API\HomeAPIController@specialty');

Route::post('forgotPassword','API\UserAPIController@forgotPassword');

Route::post('gameListing','API\UserAPIController@gameListing');

Route::post('gameRequestList','API\UserAPIController@gameRequestList');

Route::post('RequestAcceptReject','API\UserAPIController@RequestAcceptReject');

Route::post('ReportUser','API\UserAPIController@ReportUser');

Route::post('ReportUserdetail','API\UserAPIController@ReportUserdetail');     

Route::post('JoinedGames','API\UserAPIController@JoinedGames');

Route::post('Chat','API\UserAPIController@chat');

Route::post('Chat_recive','API\UserAPIController@chat_recive');

Route::post('friend_list','API\UserAPIController@friend_list');          

Route::post('help','API\UserAPIController@help');  

Route::post('JoinedGamesParticipant','API\UserAPIController@JoinedGamesParticipant');

Route::post('HostRating','API\UserAPIController@HostRating'); 

Route::post('ScreenAdds','API\UserAPIController@ScreenAdds');        

Route::post('userotp','API\UserAPIController@userotp');

Route::post('doctor','API\UserAPIController@doctor');

Route::post('city_update_doctor','API\UserAPIController@city_update_doctor');

Route::post('postnews','API\UserAPIController@postnews');

Route::post('newsfeedlist','API\UserAPIController@newsfeedlist');

Route::post('changePassword','API\UserAPIController@changePassword');    

Route::post('postlistbyusertypeid/{id}','API\UserAPIController@postlistbyuserid');


Route::get('viewUserProfile/{id}','API\UserAPIController@eviewUserProfile');

Route::post('likepost','API\UserAPIController@likepost');

Route::post('commentOnPost','API\UserAPIController@commentOnPost');

Route::get('Commentlist/{id}','API\UserAPIController@Commentlist');

Route::post('savepost','API\UserAPIController@savepost');

Route::post('deletepost','API\UserAPIController@deletepost');   

Route::post('savepostlist/{id}','API\UserAPIController@savepostlist');

Route::post('editdoctorprofile/{id}','API\UserAPIController@editdoctorprofile');

Route::get('viewdoctorprofile/{id}','API\UserAPIController@viewdoctorprofile');

Route::post('Topratinghost','API\UserAPIController@Maxhostrating');   

Route::post('Template','API\UserAPIController@Template');  
//Route::post('Template1','API\UserAPIController@Template1');  

Route::get('info',function(){
	return view('info');
});

