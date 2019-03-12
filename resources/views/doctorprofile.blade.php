@extends('layout.site') 
@section('title', 'Doctor Profile')
@section('content')
@if (Session::has('message_passchange'))
	<div class="alert alert-info">{{ Session::get('message_passchange') }}</div>
@endif


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
							    <form action="{{url('/')}}/editDoctorProfile" method="post" enctype="multipart/form-data">
								<div class="userdescpro">
								
									<h4>My Profile</h4>
									
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
										 <h1 class="userdesigname"><?php echo ucfirst(Request::session()->get('userdetails', 'default')->fullname); ?></h1>
										 <p class="postypedt"><?php echo ucfirst(Request::session()->get('userdetails', 'default')->specialties_name); ?></p>
										 <p class="licen">Licence Number - <?php echo Request::session()->get('userdetails', 'default')->licence_number; ?></p>
										
									</div>
									
									
									<div class="editinfofieldsdta">
									
									
										<div class="">
											<label class="userfieldsnk" for="exampleFormControlInput1">Clinic Name</label>
											<span class="useridprint"><?php echo Ucfirst(Request::session()->get('userdetails', 'default')->clinic); ?></span>
											<div class="editdownf accordion"><i class="fa fa-edit"></i></div>
											
											<div class="profilepanel revelfieldedit formslogins">
												
												<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Clinic Name" value="<?php echo Ucfirst(Request::session()->get('userdetails', 'default')->clinic); ?>" name="clinic">
											</div>
											
										</div>
										
										<div class="">
											<label class="userfieldsnk" for="exampleFormControlInput1">Working Hours</label>
											
											<span class="useridprint">8-10 Hours</span>
											<div class="editdownf accordion"><i class="fa fa-edit"></i></div>
											
											<div class="profilepanel revelfieldedit formslogins">
												
												<div class="fromrage col-md-6">
												<p><strong>From:</strong> Hours</p>
												<select placeholder="name@example.com">
												  <option value="volvo">1</option>
												  <option value="volvo">2</option>
												  <option value="volvo">3</option>
												  <option value="volvo">4</option>
												  <option value="volvo">5</option>
												  <option value="volvo">6</option>
												  <option value="volvo">7</option>
												  <option value="volvo">8</option>
												  <option value="volvo">9</option>
												  <option value="volvo">10</option>
												  <option value="volvo">11</option>
												  <option value="volvo">12</option>
												  <option value="volvo">13</option>
												  <option value="volvo">14</option>
												  <option value="volvo">15</option>
												  <option value="volvo">16</option>
												  <option value="volvo">17</option>
												  <option value="volvo">18</option>
												  <option value="volvo">19</option>
												  <option value="volvo">20</option>
												  <option value="volvo">21</option>
												  <option value="volvo">22</option>
												  <option value="volvo">23</option>
												  <option value="volvo">00</option>
												</select>
												</div>
												
												
												<div class="fromrage col-md-6">
												<p><strong>To:</strong> Hours</p>
												<select placeholder="name@example.com">
												  <option value="volvo">1</option>
												  <option value="volvo">2</option>
												  <option value="volvo">3</option>
												  <option value="volvo">4</option>
												  <option value="volvo">5</option>
												  <option value="volvo">6</option>
												  <option value="volvo">7</option>
												  <option value="volvo">8</option>
												  <option value="volvo">9</option>
												  <option value="volvo">10</option>
												  <option value="volvo">11</option>
												  <option value="volvo">12</option>
												  <option value="volvo">13</option>
												  <option value="volvo">14</option>
												  <option value="volvo">15</option>
												  <option value="volvo">16</option>
												  <option value="volvo">17</option>
												  <option value="volvo">18</option>
												  <option value="volvo">19</option>
												  <option value="volvo">20</option>
												  <option value="volvo">21</option>
												  <option value="volvo">22</option>
												  <option value="volvo">23</option>
												  <option value="volvo">00</option>
												</select>
												</div>
												
											</div>
										</div>	
										
										<div class="">
											<label class="userfieldsnk" for="exampleFormControlInput1">Availablity(days)</label>
											
											<span class="useridprint"><?php echo Request::session()->get('userdetails', 'default')->avilability; ?></span>
											<div class="editdownf accordion"><i class="fa fa-edit"></i></div>
											
											<div class="profilepanel revelfieldedit formslogins">
												<?php
													$unique_elm = explode(",",Request::session()->get('userdetails', 'default')->avilability)
												?>
												
												<select name="avilability[]" placeholder="name@example.com" class="limitedNumbChosen" multiple="multiple">
												  <option value="M" <?php if(in_array("M", $unique_elm)) { echo "selected"; } ?>>Monday</option>
												  <option value="T" <?php if(in_array("T", $unique_elm)) { echo "selected"; } ?>>Tuesday</option>
												  <option value="W" <?php if(in_array("W", $unique_elm)) { echo "selected"; } ?>>Wednesday</option>
												  <option value="Th" <?php if(in_array("Th", $unique_elm)) { echo "selected"; } ?>>Thursday</option>
												  <option value="F" <?php if(in_array("F", $unique_elm)) { echo "selected"; } ?>>Friday</option>
												  <option value="Sat" <?php if(in_array("Sat", $unique_elm)) { echo "selected"; } ?>>Saturday</option>
												  <option value="S" <?php if(in_array("S", $unique_elm)) { echo "selected"; } ?>>Sunday</option>
												</select>
											</div>
											
											
											
										</div>
										
										
										
										<div class="">
											<label class="userfieldsnk" for="exampleFormControlInput1">Location</label>
											<span class="useridprint"><?php echo Request::session()->get('userdetails', 'default')->city_name; ?></span>
											<div class="editdownf accordion"><i class="fa fa-map-marker"></i></div>
											
											<div class="profilepanel revelfieldedit formslogins">
												
												<select class="limitedNumbChosen" id="city_id" name="city_id" >
						<option value="">select city</option>
						<?php foreach ($city_list as $value) { ?>	
        <option value="<?php echo $value->id.','.$value->name; ?>" <?php if(Request::session()->get('userdetails', 'default')->city_id == $value->id){ echo "selected"; } ?>><?php echo ucfirst($value->name); ?></option>
       <?php } ?>
		</select>
											</div>
											
										</div>
									    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
									    <div class="actionloginbs">
												<button type="submit" class="btn btn-primary">Save</button>
											</div>
									</div>
								</div>
							</div>
						
						</div>
							</form>
						<div id="London" class="tabcontent">
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 news-feedss">
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
														<span class="desg-post">Gernal Physician</span>
														<p>{{ucfirst($value->description)}}</p>
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

						<div id="Paris" class="tabcontent">
						
						   <!-- <div class="enablenotify">
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
						<form action="{{action('API\HomeAPIController@changePassword')}}" method="post">
							<div class="form-group">
								
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Old Password." name="oldpassword">
								
								
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="New Password" name="password">
								
									<input type="hidden"  name="usertype" value="doctor">

									<input type="hidden"  name="user_id" value="<?php echo Crypt::encryptString(Request::session()->get('userdetails', 'default')->id); ?>">
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password" name="password_confirmation">
								<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
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
	

<script type="text/javascript">
	$(".limitedNumbChosen").select2();
</script>

	@endsection