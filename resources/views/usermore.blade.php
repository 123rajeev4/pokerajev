@extends('layout.site') 
@section('title', 'userprofile more details')
@section('content')
<style type="text/css">
    .para1{
        max-height: 55px;
        overflow: hidden;
    }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
            <div class="morepagessection">
                <div class="">
                        <div class="tabdocts">
                          <a href="<?php echo url('/').'/'.Request::session()->get('userdetails', 'default')->usertype.'profile';?>" target="_blank" class="tablinks">User Profile</a>
                          <button class="tablinks active" onclick="openCity(event, 'Tokyo')">Saved</button>
                        </div>

                        

                        <div id="Tokyo" style="display:block;" class="tabcontent">
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
                                 <?php if(!empty($value->speciality_name)){ ?>
                                <span class="desg-post">{{ucfirst($value->speciality_name)}}</span>
                                <?php } ?>
                                <p class="para1">{{ucfirst($value->description)}}</p>
                            </div>
                        </a>  
                    </div>
                    <div class="your-post-anchore">
                        <ul class="yourpost-ul">
                            <li><a href="#"><span class="yourposticon"><i class="fa fa-comment" aria-hidden="true"></i></span></a></li>
                            
                            <li><a href="#"><span class="yourposticon"><i class="fa fa-share-alt" aria-hidden="true"></i></span></a>
                                <ul class="your-post-share-ul">
                                     <li><a href="https://api.whatsapp.com/send?&text={{$value->shareurl}}" target="_blank">Whatsapp</a></li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{$value->shareurl}}" target="_blank">Facebook</a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{$value->shareurl}}&title={{ucfirst($value->title)}}&summary={{ucfirst($value->description)}}&source=Healthapp">LinkedIn</a></li>
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