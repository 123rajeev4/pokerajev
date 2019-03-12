@extends('layout.site') 
@section('title', 'Doctor Signup')
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
                        <form action="{{action('API\HomeAPIController@doctorsignup')}}" method="post">
                            <div class="form-group">
                                 
                                 <label for="exampleFormControlInput1">Full Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full Name" name="fullname">
                                <span class="formerror"><?php
                                    if(isset($messages['fullname']['0']) && !empty($messages['fullname']['0'])){
                                        echo $messages['fullname']['0'];
                                    }
                                ?></span>
                                
                                <label for="exampleFormControlInput1">Email ID</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                                <span class="formerror"><?php
                                    if(isset($messages['email']['0']) && !empty($messages['email']['0'])){
                                        echo $messages['email']['0'];
                                    }
                                ?></span>
                                
                                <label for="exampleFormControlInput1">Phone Number</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number" name="phone">
                                  <span class="formerror"><?php
                                    if(isset($messages['phone']['0']) && !empty($messages['phone']['0'])){
                                        echo $messages['phone']['0'];
                                    }
                                ?></span>
                               <label for="exampleFormControlInput1">City</label>
                                <select placeholder="name@example.com" name="city_id" id="city_id" required>
                                 <?php

                                   foreach ($all_name_cities as $key => $value) {
                                     
                                  
                                ?>
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                                 
                                  <?php

                              }

                              ?>
                                </select>
                                
                                <label for="exampleFormControlInput1">Speciality</label>
                                <select placeholder="name@example.com" name="speciality_id" id="speciality_id">
                                 <?php

                                   foreach ($all_name as $key => $value) {
                                     
                                  
                                ?>
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                                 
                                  <?php

                              }

                              ?>
                                </select>
                                 <input type="hidden" class="form-control" id="the_other_speciality" placeholder="enter your speciality" name="the_other_speciality">
                                
                                <label for="exampleFormControlInput1">Clinic</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Clinic" name="clinic">
                                  <span class="formerror"><?php
                                    if(isset($messages['clinic']['0']) && !empty($messages['clinic']['0'])){
                                        echo $messages['clinic']['0'];
                                    }
                                ?></span>
                                
                                <label for="exampleFormControlInput1">License Number</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="License Number" name="licence_number">
                                  <span class="formerror"><?php
                                    if(isset($messages['licence_number']['0']) && !empty($messages['licence_number']['0'])){
                                        echo $messages['licence_number']['0'];
                                    }
                                ?></span>
                                
                                <label for="exampleFormControlInput1">Expertise Areas</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Expertise Areas" name="expertise_area">
                                  <span class="formerror"><?php
                                    if(isset($messages['expertise_area']['0']) && !empty($messages['expertise_area']['0'])){
                                        echo $messages['expertise_area']['0'];
                                    }
                                ?></span>
                                
                                <div class="radionforms">
                                <label>Insurance Accepted</label>
                                <p><input type="radio" name="accepted" class="accepted" value="1">Yes
                                <input type="radio" name="accepted" class="accepted" value="0"> No</p>
                                </div>
                                <div id="divia" style="display: none;" >
                                	<input type="text" class="form-control" id="insurance_accept1" placeholder="enter your insurance" name="insurance_accept1">
                                	<input type="hidden" class="form-control" id="insurance_accept" placeholder="enter your insurance" name="insurance_accept">
	                                <ol id="demo"></ol>
									<div class="addinsuranc">
									<input type='button' class="addinsubtn" onclick='changeText2()' value='Submit' />
									<i class="fa fa-plus"></i>
									</div>
                                </div>
                                <label for="inputPassword">Password</label>
								<div class="showornotpas">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
								<div class="paswdshowsck">
								<input type="checkbox" class="oppwas" onclick="showpasswordFunction()"><i class="fa fa-eye"></i>
								</div>
                                  <span class="formerror"><?php
                                    if(isset($messages['password']['0']) && !empty($messages['password']['0'])){
                                        echo $messages['password']['0'];
                                    }
                                ?></span>
                                </div>
                                <label for="inputPassword">Confirm Password</label>
								<div class="showornotpas">
								
                                <input type="password" class="form-control oppwasconf" id="inputPassword" placeholder="Confirm Password" name="password_confirmation">
								<div class="paswdshowsck">
								<input type="checkbox" id="pwchecknext"><i class="fa fa-eye"></i>
								</div>
								</div>
								
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="actionloginbs">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                                    <div class="center section"><small class="fs13">Already have an account?<a  href="{{action('API\HomeAPIController@doctorlogin')}}"> Login Here</a></small></div>                       
                            </div>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#speciality_id").change(function(){
       if($('#speciality_id').val() == '7'){
       		$('#the_other_speciality').attr('type','text');
       } else {
       		$('#the_other_speciality').attr('type','hidden');
       }
    });
});
</script> 

<script type="text/javascript">
	$(".accepted").click(function(){
		alert($(this).val());
		if($(this).val() == '1'){
			$('#divia').css('display','block');
		} else {
			$('#divia').css('display','none');
		}
	});
</script>

<script>
var list = document.getElementById('demo');
var lastid = 0;


function changeText2() {
    var firstname = document.getElementById('insurance_accept1').value;
    var insurance_accept_hidden = $('#insurance_accept').val();
    $('#insurance_accept').val(insurance_accept_hidden+","+firstname);
    var entry = document.createElement('li');
    entry.appendChild(document.createTextNode(firstname));
    entry.setAttribute('id','item'+lastid);
    var removeButton = document.createElement('button');
    removeButton.appendChild(document.createTextNode("x"));
    removeButton.setAttribute('onClick','removeName("'+'item'+lastid+'")');
    entry.appendChild(removeButton);
    lastid+=1;
    list.appendChild(entry);
}


function removeName(itemid){
    var item = document.getElementById(itemid);
   
    var insurance_accept_hidden = $('#insurance_accept').val();
   
    var newvar1 = insurance_accept_hidden.split(",");

    var i;
	for (i = 0; i < newvar1.length; i++) { 
	    if(newvar1[i]+'remove' == $('#'+itemid).text()){
	    	
	    	newvar1.splice(i, 1);
	    }
	}

	$('#insurance_accept').val(newvar1);
	 list.removeChild(item);
}
</script>

@endsection

