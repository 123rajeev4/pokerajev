@extends('layout.site') 
@section('title', 'doctorprofile more details')
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
            <div class="morepagessection">
                <div class="">
                        <div class="tabdocts">
                          <a href="{{url('/subscription')}}" target="_blank" class="tablinks">Subscription Plans</a>
                          <button class="tablinks active" onclick="openCity(event, 'Paris')">View Ratings and Reviews</button>
                          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Saved</button>
                        </div>

                        

                        <div id="Paris" style="display:block;" class="tabcontent">
                        
                        <div class="averageratings">
                        <h6>Average Ratings</h6>
                            <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        
                            <h4>Reviews (57)</h4>
                          <div class="notiftabs">
                            <div class=" userpic">
                                <img src="{{asset('public/assets/images/user.png')}}">
                            </div>
                            
                            <div class="usernotify">
                            <h6>Rohonda Adkins</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> 
                            <span class="notifytimes"><i class="fa fa-star"></i> 90%</span>
                            </div>
                            
                          </div>
                          
                          <div class="notiftabs">
                            <div class=" userpic">
                                <img src="{{asset('public/assets/images/user.png')}}">
                            </div>
                            
                            <div class="usernotify">
                            <h6>Rohonda Adkins</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> 
                            <span class="notifytimes"><i class="fa fa-star"></i> 90%</span>
                            </div>
                            
                          </div>
                          
                          <div class="notiftabs">
                            <div class=" userpic">
                                <img src="{{asset('public/assets/images/user.png')}}">
                            </div>
                            
                            <div class="usernotify">
                            <h6>Rohonda Adkins</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> 
                            <span class="notifytimes"><i class="fa fa-star"></i> 90%</span>
                            </div>
                            
                          </div>
                        </div>

                        <div id="Tokyo" class="tabcontent">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 news-feedss">
        <div class="">
            <div class="hading_by_title">
                <h4>Saved Posts</h4>
            </div>
           <?php

            	foreach ($items as $value) {
            		
            		//print_r($value);
            	
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="your-posts-section">
                    <div class="your-posts-pic-para">
                        <a href="{{$value->shareurl}}" class="newsfeed_a_all">
                            <div class="post-profile">
                                <img src="{{$value->image}}" class="img-responsive">
                            </div>
                            <div class="post-profile-paraes">
                                 <h4>{{ucfirst($value->fullname)}}</h4>
                                <span class="desg-post">{{ucfirst($value->speciality_name)}}</span>
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

        ?>

        {{ $items->links() }}
            
        </div>
    </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection