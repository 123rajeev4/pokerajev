@extends('layout.site') 
@section('title', '')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
			<div class="loginsignbox">
				<div class="infowarpper">
					<div class="main-hd">
						<h1>New To My Doctor ?</h1>
					</div>
					<div class="listspecs">
						<ul>
							<li><i class="fa fa-handshake-o"></i><span class="text">One click apply using My Doctor profile.</span></li>
							<li><i class="fa fa-handshake-o"></i><span class="text">Get relevant doctor recommendations..</span></li>
							<li><i class="fa fa-handshake-o"></i><span class="text">Showcase profile to top doctors and clinics..</span></li>
							<li><i class="fa fa-handshake-o"></i><span class="text">Know application status on applied Clinics.</span></li>
						</ul>
					</div>
				</div>
				<div class="loginwarpper">
					<div class="formslogins">
					    <div class="logoindivs">
							<div class="main-hd">
								<h1>Login</h1>
							</div>
							<form action="{{action('API\HomeAPIController@userlogin')}}" method="post">
								<div class="form-group">
									<label for="exampleFormControlInput1">Email ID/ Phone Number</label>
									<input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email ID/ Phone Number">
									<span class="formerror"><?php
                                	if(isset($messages['email']['0']) && !empty($messages['email']['0'])){
                                		echo $messages['email']['0'];
                                	}
                                ?></span>
									<label for="inputPassword">Password</label>
									<div class="showornotpas">
									<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
										<div class="paswdshowsck">
											<input type="checkbox" class="oppwas" onclick="showpasswordFunction()"><i class="fa fa-eye"></i>
										</div>
									</div>
									<span class="formerror"><?php
                                	if(isset($messages['password']['0']) && !empty($messages['password']['0'])){
                                		echo $messages['password']['0'];
                                	}
                                ?></span>
									<div class="forgot-password-wrapper"><a href="forgetpasword.html"><i>Forgot Password?</i></a></div>
									<div class="actionloginbs">
									<button type="submit" class="btn btn-primary">Log In</button>
									</div>
									<div class="center section"><small class="fs13">New to My Doctor UAE?<a  href="{{action('API\HomeAPIController@usersignup')}}"> Sign Up</a></small></div>						
								</div>
								<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection