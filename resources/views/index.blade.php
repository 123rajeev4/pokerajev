@extends('layout.site') 
@section('title', 'Home page')
@section('content')
<style type="text/css">
    .para1{
        max-height: 55px;
        overflow: hidden;
    }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 banner-slider">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="{{asset('public/assets/images/slider-banner/1.png')}}" class="img-responsive" alt="">
            </div>

            <div class="item">
              <img src="{{asset('public/assets/images/slider-banner/2.png')}}" class="img-responsive" alt="">
            </div>

            <div class="item">
              <img src="{{asset('public/assets/images/slider-banner/3.png')}}" class="img-responsive" alt="">
            </div>

            <div class="item">
              <img src="{{asset('public/assets/images/slider-banner/4.png')}}" class="img-responsive" alt="">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    
    <!--end slider section-->
    
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-section">
        <div class="container">
            <div class="search-health-sec">
				<div class="search-section-he">
					<input type="text" class="serach_inp" placeholder="Search for any keyword">
				</div>
				
				<div class="search-section_btn">
                    <input type="button" class="btn-search-health" value="Search">
                </div>
            </div>
        </div>
    </div>
    <form action="{{url('/')}}/listing" method="post">
        <input type="hidden" name="city_id" id="city_id">
        <input id="index_old" type="submit" style="display: none;">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    </form>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cites-section">
        <div class="container-fluid">
        <?php
          $icity  = 0; 
          foreach ($all_name_cities as $value) {
            
            if($icity == 0){ 
        ?>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="cuntrey-select">
					<img src="{{asset('public/assets/images/city/abd.png')}}" class="img-responsive" alt="">
					<a id="city_value{{$value->id}}" data="{{$value->id}}">
                        <div class="city-name">
                            <img src="{{asset('public/assets/images/logo-half.png')}}" class="img-responsive center-block" alt="">
                            <h5>{{$value->name}}</h5>
                        </div>   
                    </a>
                </div>
            </div>
            <?php
        } else if($icity%2 != 0) { ?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="cuntrey-select-right">
                            <img src="{{asset('public/assets/images/city/ajman.png')}}" class="img-responsive" alt="">
                            <a id="city_value{{$value->id}}" data="{{$value->id}}">
                                <div class="city-name_right">
                                    <img src="{{asset('public/assets/images/logo-half.png')}}" class="img-responsive center-block" alt="">
                                    <h5>{{$value->name}}</h5>
                                </div> 
                            </a>
                        </div>
                    </div>
                </div>
            
<?php        } else if($icity%2 == 0) { ?>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="cuntrey-select-right">
                            <img src="{{asset('public/assets/images/city/sharjha.png')}}" class="img-responsive" alt="">
                            <a id="city_value{{$value->id}}" data="{{$value->id}}">
                                <div class="city-name_right">
                                    <img src="{{asset('public/assets/images/logo-half.png')}}" class="img-responsive center-block" alt="">
                                    <h5>{{$value->name}}</h5>
                                </div>  
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>

<?php
}

        $icity++;


        ?>

<script type="text/javascript">
    $('#city_value{{$value->id}}').click(function(){
            $('#city_id').val($('#city_value{{$value->id}}').attr('data'));
            //alert($('#city_value{{$value->id}}').attr('data'));
            $('#index_old').click();
    });
</script>

        <?php
        }

        ?>
            
        </div>
    </div>
    
    <!--end city section-->
    
    
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 news-feedss">
        <div class="container">
            <div class="hading_by_title">
                <h4>TOP ISSUES</h4>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-1.png')}}" class="img-responsive" alt="">
                    <a href="docter-list.html">
                        <div class="categrese-name">
                            <h5>Dermatologist</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-2.png')}}" class="img-responsive" alt="">
                    <a href="docter-list.html">
                        <div class="categrese-name">
                            <h5>Dentist</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-3.png')}}" class="img-responsive" alt="">
                    <div class="categrese-name">
                        <h5>Cardiologist</h5>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-4.png')}}" class="img-responsive" alt="">
                    <a href="docter-list.html">
                        <div class="categrese-name">
                            <h5>Anesthesiologist</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-5.png')}}" class="img-responsive" alt="">
                    <a href="docter-list.html">
                        <div class="categrese-name">
                            <h5>Allergist</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-6.png')}}" class="img-responsive" alt="">
                    <a href="docter-list.html">
                        <div class="categrese-name">
                            <h5>Immunologist</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-7.png')}}" class="img-responsive" alt="">
                    <a href="docter-list.html">
                        <div class="categrese-name">
                            <h5>Neurologist</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="categrese">
                    <img src="{{asset('public/assets/images/categrese/categrese-8.png')}}" class="img-responsive" alt="">
                    <a href="docter-list.html">
                        <div class="categrese-name">
                            <h5>Orthopedic</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end news feed-->
    
    
    
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_categres" id="top_categres">
	
	
	<div class="container">
            <div class="hading_by_title">
                <h4>NEWS FEED</h4>
            </div>
            
    <div style="display: none;" class="alert alert-info" id="newsfeed_alert"></div>

            <?php

               $i = 0; 

                foreach ($postlist as  $value) {
                   //print_r($value);
                
                    if($i < 6)
                    {

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
                                <?php if(!empty($value->speciality_name)){ ?>
                                <span class="desg-post">{{ucfirst($value->speciality_name)}}</span>
                                <?php } ?>
                                <p class="para1">{{ucfirst($value->description)}}</p>
                            </div>
                        </a>  
                    </div>
                    <div class="your-post-anchore">
                        <ul class="yourpost-ul">
                            <li><a href="{{$value->shareurl}}"><span class="yourposticon"><i class="fa fa-comment" aria-hidden="true"></i></span></a></li>
                            <li><a id="likepost{{$value->post_id}}" data='{{Crypt::encryptString($value->post_id)}}' ><span class="yourposticon"><i <?php

                                if($value->likeflag == 1){
                                 echo 'style="color: #1c998c;"';
                                } ?> class="fa fa-heart" aria-hidden="true"></i></span></a></li>
                            <li><a id="savepost{{$value->post_id}}" data='{{Crypt::encryptString($value->post_id)}}' ><span class="yourposticon"><i <?php

                                if($value->saveflag == 1){
                                 echo 'style="color: #1c998c;"';
                                } ?> class="fa fa-bookmark" aria-hidden="true"></i></span></a></li>
                            <li><a href="#"><span class="yourposticon"><i class="fa fa-share-alt" aria-hidden="true"></i></span></a>
                                <ul class="your-post-share-ul">
                                     <li><a href="https://api.whatsapp.com/send?&text={{$value->shareurl}}" target="_blank">Whatsapp</a></li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{$value->shareurl}}" target="_blank">Facebook</a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{$value->shareurl}}&title={{ucfirst($value->title)}}&summary={{ucfirst($value->description)}}&source=Healthapp">LinkedIn</a></li>
                                    <!-- <li><a href="#">Intagram</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
    
    $('#likepost{{$value->post_id}}').click(function(){

           
            $.get("{{url('/likepost/')}}/"+$(this).attr('data'),function(data, status){
                     var data1 = data.split("_");
                     if(data1[1] == '0'){
                        window.location.href = data1[0];
                     } else {

                         if(data1[2] == '0'){
                            $('#likepost{{$value->post_id}} span i').css('color','');
                         }

                         if(data1[2] == '1'){
                            $('#likepost{{$value->post_id}} span i').css('color','#1c998c');
                         }

                          $('#newsfeed_alert').text(data1[0]);
                         $('#newsfeed_alert').css('display','block');
                       
                     }
            });

            
    });

    $('#savepost{{$value->post_id}}').click(function(){

           
            $.get("{{url('/savepost/')}}/"+$(this).attr('data'),function(data, status){
                     var data1 = data.split("_");
                     if(data1[1] == '0'){
                        window.location.href = data1[0];
                     } else {

                         if(data1[2] == '0'){
                            $('#savepost{{$value->post_id}} span i').css('color','');
                         }

                         if(data1[2] == '1'){
                            $('#savepost{{$value->post_id}} span i').css('color','#1c998c');
                         }

                         $('#newsfeed_alert').text(data1[0]);
                         $('#newsfeed_alert').css('display','block');
                     }
            });

            
    });
</script>

            <?php

        }

        $i++;
        }

        ?>

        <a class="label label-primary" style="float: right;" href="{{url('/newsfeedlist')}}">read more--></a>
           
        </div>
        
    </div>
    
    <!--end top categrese-->
    
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about-section">
        <div class="container">
            <div class="abot_section-content">
                <div class="abt-hading">
                    <h4>About Us</h4>
                </div>
                <div class="abt-para">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when ...
                    You've visited this page many times. Last visit: 27/6/18Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when ...
                    You've visited this page many times. Last visit: 27/6/18Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when ...
                    You've visited this page many times. Last visit: 27/6/18Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when ...
                    You've visited this page many times. Last visit: 27/6/18</p>
                </div>
            </div>
        </div>
    </div>
    
    <!--end about section-->
    
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 download-app">
        <div class="container">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="mobile-section-scree">
                    <img src="{{asset('public/assets/images/app_img.svg')}}" class="img-responsive" alt="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <div class="mobile-section-details">
						<small>Application</small>
						<h3>Download <strong>Findoctor App</strong> Now!</h3>
						<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when ... You've visited this page many times. Last visit: 27/6/18Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
						<div class="app_buttons" >
							<a href="#0" class="fadeIn"><img src="{{asset('public/assets/images/apple_app.png')}}" alt="" width="150" height="50" data-retina="complete"></a>
							<a href="#0" class="fadeIn"><img src="{{asset('public/assets/images/google_play_app.png')}}" alt="" width="150" height="50" data-retina="complete"></a>
					   </div>
                </div>
            </div>
        </div>
    </div>

    

    <!--end app design section-->
@endsection

