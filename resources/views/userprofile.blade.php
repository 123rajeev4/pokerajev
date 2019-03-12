@extends('layout.site') 
@section('title', 'User Profile')
@section('content')
@if (Session::has('message_passchange'))
	<div class="alert alert-info">{{ Session::get('message_passchange') }}</div>
@endif
<style type="text/css">
    .para1{
        max-height: 55px;
        overflow: hidden;
    }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 userpropge">
        <div class="container">
			<div class="morepagessection">
				<div class="">
						<div class="tabdocts">
						  <button class="tablinks active" onclick="openCity(event, 'Userpro')">User Profile</button>
						  <button class="tablinks" onclick="openCity(event, 'London')">Your Posts</button>
						  <button class="tablinks" onclick="openCity(event, 'Paris')">Notification</button>
						  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Change Password</button>
						</div>

						
						<div id="Userpro" class="tabcontent" style="display:block;">
							<div class="userprofilename">
							    <form action="{{url('/')}}/editUserProfile" method="post" enctype="multipart/form-data">
								<div class="userdescpro">
								     
									<h4>My Profile</h4>
									
									<p id="userprofileresponse"></p>
									<div class="imageuserdocs">
										<div class="profileinf">
										<img id="profile-img-tag" src="<?php
										if(empty(Request::session()->get('userdetails', 'default')->image)){
											echo 'https://mobulous.app/fametales/public/img/user_signup.png';
										} else {
											echo url('/').'/public/'.Request::session()->get('userdetails', 'default')->image;
										}
										?>">
										<i class="fa fa-camera"></i>
										
										  <input id="profile-img" class="cameraupload" type="file" name="image" accept="image/*">
										</div>
										<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
										<script type="text/javascript">
										    function readURL(input) {
										        if (input.files && input.files[0]) {
										            var reader = new FileReader();
										            
										            reader.onload = function (e) {
										                $('#profile-img-tag').attr('src', e.target.result);
										            }
										            reader.readAsDataURL(input.files[0]);
										        }
										    }
										    $("#profile-img").change(function(){
										        readURL(this);
										    });
										</script>
										 <h1><?php echo Request::session()->get('userdetails', 'default')->fullname; ?></h1>
									</div>
									
									
									<div class="editinfofieldsdta">
									
									
										<div class="">
											<label class="userfieldsnk" for="exampleFormControlInput1">Email Id</label>
											<span class="useridprint"><?php echo Request::session()->get('userdetails', 'default')->email; ?></span>
											<div class="editdownf accordion"><i class="fa fa-edit"></i></div>
											
											<div class="profilepanel revelfieldedit formslogins">
												
												<input type="email" class="form-control" id="email_saveprofile" placeholder="name@example.com" name="email" value="<?php echo Request::session()->get('userdetails', 'default')->email; ?>">
											</div>
											
										</div>
										
										<div class="">
											<label class="userfieldsnk" for="exampleFormControlInput1">Contact Number</label>
											
											<span class="useridprint"><?php echo Request::session()->get('userdetails', 'default')->phone; ?></span>
											<div class="editdownf accordion"><i class="fa fa-edit"></i></div>
											
											<div class="profilepanel revelfieldedit formslogins">
												
												<input name="phone" type="text" class="form-control" id="phone_saveprofile" placeholder="phone number" value="<?php echo Request::session()->get('userdetails', 'default')->phone; ?>">
											</div>
											<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
											<div class="actionloginbs">
												<button id="save_user_profile" type="submit" class="btn btn-primary save_user_profile">Save</button>
											</div>
											
										</div>
									  
									
									</div>
								</div>
							</div>
						</form>
						</div>
						<div id="London" class="tabcontent">
						  <div id="Addposts" class="postadcontent" style="display:block;">
						  
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 news-feedss">
						  
						  <div class="bookbtn">
						 
						  </div>
								<div class="">
									<div class="hading_by_title">
										<h4>Your Posts</h4>
									</div>
									<?php
									

									if(empty($get_news_feedlist)){ ?>
										No recorde found
							<?php		} else {

									foreach ($get_news_feedlist as $value) {
										
									//print_r($value);

							 ?>

									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<div class="your-posts-section">
											<div class="your-posts-pic-para">
												<a href="docter-newsfeed-user.html" class="newsfeed_a_all">
													<div class="post-profile">
														<img src="{{$value->image}}" class="img-responsive">
													</div>
													<div class="post-profile-paraes">
														<h4>{{ucfirst($value->title)}}</h4>
														
														<p class="para1">{{ucfirst($value->description)}}</p>
													</div>
												</a>  
											</div>
											<div class="your-post-anchore">
												<ul class="yourpost-ul">
													<li><a href="#"><span class="yourposticon"><i class="fa fa-comment" aria-hidden="true"></i></span></a></li>											
													<li><a href="#"><span class="yourposticon"><i class="fa fa-share-alt" aria-hidden="true"></i></span></a>
														<ul class="your-post-share-ul">
															<li><a href="#">Whatsapp</a></li>
															<li><a href="#">Facebook</a></li>
															<li><a href="#">LinkedIn</a></li>
															<li><a href="#">Intagram</a></li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>

								<?php

}

									}
									?>
									
								</div>
							</div>
							</div>
							
							<div id="addpostform" class="postadcontent" style="display:none;">		
								<div class="bookbtn">
								<button class="posttablinks btn btn-primary" onclick="openPosts(event, 'Addposts')"><i class="fa fa-caret-left"></i> back</button>
								</div>
								
								<div class="formslogins">
									<div class="regisindivs">
									<div class="main-hd">
										<h1>Add Posts Here</h1>
									</div>
									<form>
										<div class="form-group">
											
											<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Post Title.">
											
											<div class="poslable">
											<label class="optionalst">Post Image (optional) </label>
											<input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Description">
											</div>
											
											<textarea placeholder="Description"></textarea>

											<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="News Feed url (optional)">
											
											<div class="actionloginbs">
											<button type="submit" class="btn btn-primary">Save</button>
											</div>
																		
										</div>
									</form>
									</div>
								</div>
							</div>
							
						</div>

						<div id="Paris" class="tabcontent">
						
						   <!--<div class="enablenotify">
							<label class="switch">
								  <input type="checkbox" checked="">
								  <span class="slidergreen round"></span>
							</label>
							<p class="enabtxt">Enable/Disable Notification</p>
                           </div> -->

						  <div class="notiftabs">
							<div class=" userpic">
								<img src="{{asset('public/assets/images/user.png')}}">
							</div>
							
							<div class="usernotify">
							<p>You Have a booking on 29/07/2018</p> 
							<span class="notifytimes">10h</span>
							</div>
							
						  </div>
						  
						  <div class="notiftabs">
							<div class=" userpic">
								<img src="{{asset('public/assets/images/user.png')}}">
							</div>
							
							<div class="usernotify">
							<p>You Have a booking on 29/07/2018</p> 
							<span class="notifytimes">10h</span>
							</div>
							
						  </div>
						  
						  <div class="notiftabs">
							<div class=" userpic">
								<img src="{{asset('public/assets/images/user.png')}}">
							</div>
							
							<div class="usernotify">
							<p>You Have a booking on 29/07/2018</p> 
							<span class="notifytimes">10h</span>
							</div>
							
						  </div>
						</div>

						<div id="Tokyo" class="tabcontent">
							<div class="">
					<div class="formslogins">
					   
						
						<div class="regisindivs">
						<div class="main-hd">
							<h1>Change Password</h1>
						</div>
						<form >
						{{ csrf_field() }}
							<div class="form-group">
								
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Old Password." name="oldpassword">
								
								
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="New Password" name="password">
								
									<input type="hidden"  name="usertype" value="user">

									<input type="hidden"  name="user_id" value="<?php echo Crypt::encryptString(Request::session()->get('userdetails', 'default')->id); ?>">
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password" name="password_confirmation">
								
								<div class="actionloginbs">
								<button type="submit" class="btn btn-primary">Save</button>
								</div>
															
							</div>
						</form>
						</div>
						
					</div>
				</div>
						</div>
				</div>
			</div>
		</div>
	</div>
  

@endsection