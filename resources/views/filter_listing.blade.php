@extends('layout.site') 
@section('title', 'Doctor Listing')
@section('content')
<style type="text/css">
	.srcfilts{
		padding: 10px;
	}
</style> 
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_categres">
        <div class="container">
		
		<div class="hading_by_title">
						<h4>Doctors</h4>
					</div>
			<div class="col-md-4">
			
			<div class="formslogins">
			    <div class="form-group">
				<div class="srcfilts">
				<form action="{{url('/')}}/listing" method="post">
					<input type="hidden" id="city_id1" name="city_id" value="">
					<input type="hidden" id="speciality_id1" name="speciality_id" value="">
					<input type="hidden" id="search_name1" name="search_name" value="">
					<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
					<input type="submit" id="filter_form" style="display: none;">
				</form>
				
		
						<select class="limitedNumbChosen" id="city_id" >
						<option value="0">select city</option>
						<?php foreach ($city_list as $value) { ?>	
        <option value="<?php echo $value->id; ?>" <?php if(Request::session()->get('city_id') == $value->id){ echo "selected"; } ?>><?php echo ucfirst($value->name); ?></option>
       <?php } ?>
		</select>
		</div>
		<div class="srcfilts">
				
		
						<select class="limitedNumbChosen" id="speciality_id" >
						<option value="0">select specialty</option>
       	<?php foreach ($specialties_list as $value) { ?>	
        <option value="<?php echo $value->id; ?>" <?php if(Request::session()->get('speciality_id') == $value->id){ echo "selected"; } ?>><?php echo ucfirst($value->name); ?></option>
       <?php } ?>
		</select>
		</div>
		<div class="srcfilts">
				
		
						<select class="limitedNumbChosen" id="search_name"  >
						<option value="0">search doctor name or clinic</option>
        	<?php foreach ($name_list1 as $value) { ?>	
        <option value="<?php echo ucfirst($value->fullname); ?>" <?php if(Request::session()->get('search_name') == $value->fullname){ echo "selected"; } ?>><?php echo ucfirst($value->fullname); ?></option>
       <?php } ?>
		</select>
		</div>
		
					
				</div>
			</div>
			</div>
			
			
			<div class="col-md-8 cateisses">
					<?php

					   if(empty($items)){
					   		echo "<p style='color:black;'>No recorde found!!</p>";
					   } else {

						foreach ($items as  $value) {
							
							

					?>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-6">
						<div class="your-posts-section bookingtabs doctlsttbsa">
                    <div class="your-posts-pic-para">
                            <div class="post-profile">
                                <img src="{{$value->image}}" class="img-responsive">
                            </div>
                            <div class="post-profile-paraes">
                                <h4>Dr. <?php echo ucfirst($value->fullname); ?></h4>
                                <span class="bookinfo desg-post">{{ucfirst($value->speciality_name)}}</span>
								<span class="bookinfo desg-post">{{ucfirst($value->clinic)}}</span>
								<span class="bookinfo desg-post">{{ucfirst($value->city_name)}}</span>
                                <!-- <p class="appoints">Appointments:22/05/2018 at 2:00pm</p> -->
                            </div>
						<div class="chatcomment">
						<i class="fa fa-comment" aria-hidden="true"></i>
						<p>USD ${{ucfirst($value->fee)}}</p>
						</div>    
                    </div>
					<div class="your-post-anchore">
								<ul>
									<li><div class="yourposticon"><span class="availbledays">Availablity:</span> <ul class="yourpost-ul"><?php $newavilability = explode(",", $value->avilability);
									if(!empty($value->avilability)){
									foreach ($newavilability as  $value1) {

										echo "<li>".$value1."</li>";
									}
								}
									 ?></ul></div></li>
								</ul>
					</div> 
                </div>
					</div>
					<?php

				} }

				?>
				 {{ $items->links() }}
			</div>
        </div>
    </div>
  <script type="text/javascript">
  	$(".limitedNumbChosen").select2();

  	$(".limitedNumbChosen").change(function(){
  		var city_id = $('#city_id').val();
  		var speciality_id = $('#speciality_id').val();
  		var search_name = $('#search_name').val();
  		$('#city_id1').val(city_id);
  		$('#speciality_id1').val(speciality_id);
  		$('#search_name1').val(search_name);
  		//alert(city_id);
  		$('#filter_form').click();
  	});

  </script>
    
	

@endsection