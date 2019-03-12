@extends('layout.site') 
@section('title', $retrun_array->title)
@section('content')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 news-feedss">
        <div class="container">
            
			
			
			<div class="postdecwrappers">
			<div class="subscparades">
			<div class="posttitle">
                <h4><?php echo ucfirst($retrun_array->title); ?></h4>
            </div>

			
			<?php
			if(!empty($retrun_array->post_image)){ ?>
			    <div class="poststhumbs">
				<img src="<?php echo url('/public/').'/'.$retrun_array->post_image;
					?>">
				</div>
			<?php } ?>
				<div class="imagepostdesc">
					<p><?php echo ucfirst($retrun_array->description); ?></p>
				</div>
				<div class="referenceurl">
				
				<h6>Reference Url</h6>
				<ul>
					<li><a href="<?php echo $retrun_array->url ?>"><i class="fa fa-hand-o-right"></i><?php echo $retrun_array->url ?></a></li>
				</ul>
				</div>
				
				<div class="commentpostdocs">
					<div class="formslogins">
						<div class="form-group">
							<label  class="cmthda" for="exampleFormControlInput1">Leave Your Comment</label>
							<div class="">
								<textarea class="form-control" id="cmt_on_single_post_msg" placeholder=" Your Comment"></textarea>
								<span style="color: red;" id="cmt_on_single_post_msg_error"></span>
								<div class="actionloginbs">
									<button type="submit" class="btn btn-primary" id="cmt_on_single_post">Post</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if(sizeof($return_array1) > 0){


				 ?>
				<div class="commentpostdocs" id="commentpostdocs_detail">
					<label  class="cmthda" for="exampleFormControlInput1"><?php echo sizeof($return_array1); ?> Comments</label>
					<?php foreach ($return_array1 as  $value) {
					//print_r($value);
					?>
					<div class="notiftabs">
							<div class=" userpic">
								<img src="{{$value->image}}">
							</div>
							
							<div class="usernotify">
							<label  class="cmthda usernamedoci">{{ucfirst($value->fullname)}}</label>
							<p>{{ucfirst($value->message)}}</p> 
							<span class="notifytimes commentdays">{{$value->created_at}}</span>
								
							</div>	
					</div>

					<?php  } ?>
				</div>
				
				<?php }  ?>
			
			</div>
			
			<div class="imageuserdocs userinfo">
				<div class="profileinf">
				<img src="<?php
					if(empty($retrun_array->image)){
						echo 'https://mobulous.app/fametales/public/img/user_signup.png';
					} else {
						echo url('/public/').'/'.$retrun_array->image;
					}

				?>">
				</div>
				<h1 class="userdesigname"><?php echo ucfirst($retrun_array->fullname); ?></h1>
				<p class="postypedt"><?php echo ucfirst($retrun_array->speciality_name); ?></p>
			</div>
			</div>
            
        </div>
    </div>

    <script type="text/javascript">
    	$('#cmt_on_single_post').click(function(){
    			if($('#cmt_on_single_post_msg').val() == ''){
    					$('#cmt_on_single_post_msg_error').text('Comment field required');
    			} else {
    				var message = $('#cmt_on_single_post_msg').val();
    				var post_id = '{{$retrun_array->post_id}}';
    				$.get("{{url('/commentOnPost')}}/"+message+"/"+post_id,function(result){
    					 var result = result.split('_');

    					    if(result[1] == '0'){
    					    		window.location.href = result[0];
    					    } else {
    					    	$('#commentpostdocs_detail').html(result[0]);
    					    }
    						
    				});
    				
    			}
    	});
    </script>
    @endsection