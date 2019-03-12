@extends('layout.site') 
@section('title', 'User Signup')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
            <div class="">
                
                <div class="">
                    <div class="formslogins">
                       
                        <div class="regisindivs">
                        <div class="main-hd">
                            <h1>Sign Up</h1>
                        </div>
                        <form action="{{action('API\HomeAPIController@usersignup')}}" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Full Name</label>
                                <input type="text" name="fullname" class="form-control" id="exampleFormControlInput1" placeholder=" Your Name">
                                <span class="formerror"><?php
                                	if(isset($messages['fullname']['0']) && !empty($messages['fullname']['0'])){
                                		echo $messages['fullname']['0'];
                                	}
                                ?></span>

                                 <label for="exampleFormControlInput1">Email ID</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                 <span class="formerror"><?php
                                    if(isset($messages['email']['0']) && !empty($messages['email']['0'])){
                                        echo $messages['email']['0'];
                                    }
                                ?></span>
                                
                                
                                <label for="exampleFormControlInput1">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder=" Phone Number">
                                  <span class="formerror"><?php
                                	if(isset($messages['phone']['0']) && !empty($messages['phone']['0'])){
                                		echo $messages['phone']['0'];
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
                                
                                <label for="inputPassword">Confirm Password</label>
								<div class="showornotpas">
                                <input type="password" name="password_confirmation" class="form-control oppwasconf" id="inputPassword" placeholder="Confirm Password">
								<div class="paswdshowsck">
									<input type="checkbox" id="pwchecknext"><i class="fa fa-eye"></i>
								</div>
                                </div>
                                
                                <div class="actionloginbs">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                                    <div class="center section"><small class="fs13">Already Have Account?<a  href="loginsignup.html">Login Here</a></small></div>                       
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