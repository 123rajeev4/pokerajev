
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-header statichdr doctorsflow">

    <div class="loginfordocs">
    <?php if(Request::session()->get('userdetails', 'default') == 'default'){ ?>
        <ul class="menu-ul container">
             <li><a href="#">Get the App</a></li> 
             <li><a href="{{action('API\HomeAPIController@doctorlogin')}}">For Doctors</a></li> 
              <li><a href="#">Health Feed</a></li>
             <li><a href="{{action('API\HomeAPIController@userlogin')}}">Login</a>/<a href="{{action('API\HomeAPIController@usersignup')}}">Sign Up</a></li>                        
        </ul>
        <?php}?>
        </div>
        <div class="container">
        <div class="holdconts">
            <div class="logo-section">
            <div class="logo">
            <a href="{{url('/')}}"><img src="{{asset('public/assets/images/white-logo.png')}}" class="img-responsive" alt=""></a>
            </div>
            </div>
			
			<div class="toggledivmen"><i class="menu-tog fa fa-bars" aria-hidden="true"></i> <i class="fa fa-times"></i></div>
            <div class="menu-section">
                <?php if(Request::session()->get('userdetails', 'default') != 'default'){ ?>
                <div class="menues">
                <ul class="menu-ul">
               <li><a href="#" style="color:white;"><p>Welcome: </p> <span class="username"><?php echo Request::session()->get('userdetails', 'default')->fullname; ?></span></a></li>
				<li class="userprofile"><span class="userico"><img src="<?php
                                        if(empty(Request::session()->get('userdetails', 'default')->image)){
                                            echo 'https://mobulous.app/fametales/public/img/user_signup.png';
                                        } else {
                                            echo url('/').'/public/view_profile'.Request::session()->get('userdetails', 'default')->image;
                                        }
                                        ?>"></span></li>
                    </ul>

					<div class="userlistingopn">
					<ul>
         <li><a href="<?php echo url('/').'/'.Request::session()->get('userdetails', 'default')->usertype.'profile';?>">Home</a></li>
                        <li><a href="{{url('/newsfeedlist')}}">NewsFeed</a></li>
                        <li><a href="#">Booking</a></li>
                        <li><a href="#">Chat</a></li>
						<li><a href="<?php echo url('/').'/'.Request::session()->get('userdetails', 'default')->usertype.'more';?>">More</a></li>
						<li><a href="{{action('API\HomeAPIController@logout')}}">Logout <i class="fa fa-sign-out"></i></a> </li>
					</ul>
					</div>
					
                </div>
                <?php } else { ?>
                 <div class="menues">
                    <ul class="menu-ul">
                        <li><a href="">Home</a></li>
                        <li><a href="{{url('/aboutus')}}">About Us</a></li>
                        <li><a href="">Booking</a></li>
                        <li><a href="">Chat</a></li>
                      
                        
                    </ul>
                </div>
                <?php } ?>
               </div>
            </div>
        </div>
    </div>

   