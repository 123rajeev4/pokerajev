@extends('layout.site') 
@section('title', 'news list')
@section('content')
<style type="text/css">
    .para1{
        max-height: 55px;
        overflow: hidden;
    }
</style>

    <div id="Addposts" class="postadcontent newsfeeddivs" style="display:block;">
	<div class="container">
	
             <div style="display: none;" class="alert alert-info" id="newsfeed_alert"></div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if(Request::session()->get('userdetails', 'default') != 'default'){ ?>
		   <div class="bookbtn">
				<button class="posttablinks btn btn-primary" onclick="openPosts(event, 'addpostform')">AddPosts <i class="fa fa-plus"></i></button>
			</div>
			<?php } ?>
            <div class="hading_by_title">
                <h4>NEWS FEED</h4>
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
                            <li><a href="{{$value->shareurl}}"><span class="yourposticon"><i class="fa fa-comment" aria-hidden="true"></i></span></a></li>
                            <li><a id="likepost{{$value->post_id}}" data='{{Crypt::encryptString($value->post_id)}}'><span class="yourposticon"><i <?php

                                if($value->likeflag == 1){
                                 echo 'style="color: #1c998c;"';
                                } ?> class="fa fa-heart" aria-hidden="true"></i></span></a></li>
                            <li><a id="savepost{{$value->post_id}}" data='{{Crypt::encryptString($value->post_id)}}'><span class="yourposticon"><i <?php

                                if($value->saveflag == 1){
                                 echo 'style="color: #1c998c;"';
                                } ?> class="fa fa-bookmark" aria-hidden="true"></i></span></a></li>
                            <li><a href="#"><span class="yourposticon"><i class="fa fa-share-alt" aria-hidden="true"></i></span></a>
                                <ul class="your-post-share-ul">
                                    <li><a href="https://api.whatsapp.com/send?&text={{$value->shareurl}}" target="_blank">Whatsapp</a></li>
                                     <li><a href="https://www.facebook.com/sharer/sharer.php?u={{$value->shareurl}}" target="_blank">Facebook</a></li>
                                     <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{$value->shareurl}}&title={{ucfirst($value->title)}}&summary={{ucfirst($value->description)}}&source=Healthapp" target="_blank">LinkedIn</a></li>
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

        ?>
           {{ $items->links() }}

        
     </div>
	 </div>
    </div>
	
	<div id="addpostform" class="postadcontent newsfeeddivs" style="display:none;">
    <div class="container">	
					<div class="bookbtn">
					<button class="posttablinks btn btn-primary" onclick="openPosts(event, 'Addposts')"><i class="fa fa-caret-left"></i> back</button>
					</div>

					<div class="formslogins">
									<div class="regisindivs">
									<div class="main-hd">
										<h1>Add NewsFeeds Here</h1>
									</div>
									<form action="{{url('/')}}/postnews" method="post" enctype="multipart/form-data">
										<div class="form-group">
											 <span class="formerror ertitle"></span>
											<input type="text" class="form-control" id="title_postnews" name="title" placeholder="Post Title.">
                                            
											
											<div class="poslable">
											<label class="optionalst">Post Image (optional) </label>
											<input type="file" class="form-control" id="exampleFormControlInput1" name="image" accept="Image/*">
											</div>
											 <span class="formerror erdesc"></span>
											<textarea name="description" placeholder="Description" id="description_postnews"></textarea>
                                           

											<input type="text" class="form-control" id="exampleFormControlInput1" name="url" placeholder="News Feed url (optional)">
											
											<div class="actionloginbs">
											<button type="button" id="postnews1" class="btn btn-primary">Save</button>
											</div>
																		
										</div>
                                           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
									</form>
									</div>
								</div>
	</div>
			</div>
            <script type="text/javascript">
                $('#postnews1').click(function(){
                        if($('#description_postnews').val() == ''){
                            $('.erdesc').text('Description field required');
                        } else if($('#description_postnews').val().length > 500){
                            $('.erdesc').text('Description field must be less than 500 words');
                        }

                        if($('#title_postnews').val() == ''){
                            $('.ertitle').text('Title field required');
                        } else if($('#title_postnews').val().length > 25){
                            $('.ertitle').text('Title field must be less than 25 words');
                        }

                        if($('#description_postnews').val() != '' && $('#description_postnews').val() != '' && $('#title_postnews').val().length <= 25 && $('#description_postnews').val().length <= 500){
                                $('#postnews1').attr('type','submit');
                                $('#postnews1').click();
                        }
                });
            </script>
@endsection