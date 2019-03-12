@extends('layout.admins') 
@section('title', 'My Profile')
@section('content')
<style type="text/css">
    .img-circle_new {
        border-radius: 50%;
        width: 200px;
        height: 200px;
    }
</style>


<div class="panel panel-profile">
    <div class="panel-heading">
        <h3 class="panel-title">
            My Profile
        </h3>
    </div>
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

 @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile-left">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay">
                </div>
                <div class="profile-main ">
                    <img alt="Avatar" class="img-circle img-circle_new"  src="{{url('/')}}/public/profile/{{Auth::user()->image}}">
                        <h3 class="name">
                            {{Auth::user()->fullname}}
                        </h3>
                    </img>
                     @if ($admin->image!='')
                    
        <img src="{{url('/')}}/public/view_profile/{{$admin->image}}" id="profile-img-tag" width="200px" />
                    @else
       <img src="{{url('/')}}/public/assets/images/noimages.png" id="profile-img-tag" width="200px" />

                    @endif
                </div>
            </div>

 
            <div class="profile-detail">
                <div class="profile-info">
                    <h4 class="heading">
                        Basic Info
                    </h4>
                    <ul class="list-unstyled list-justify">
                        <form action="{{url('admin/profile')}}" class="form-auth-small" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="hidden_image" value='{{$admin->image}}'>
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label sr-only" for="signin-email">
                                    Upload Photo
                                </label>
                        <input class="form-control"  type="file" name="image" id="profile-img">
                                </input>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="signin-email">
                                    Name
                                </label>
                                <input class="form-control"  placeholder="Name" name="name" type="text" value="{{$admin->name}}">
                                </input>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label sr-only" for="signin-email">
                                    Email
                                </label>
                                <input class="form-control"  placeholder="Email" type="text" name="email" value="{{$admin->email}}">
                                </input>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label sr-only" for="signin-password">
                                    Password
                                </label>
                                <input class="form-control"  placeholder="Password" name="password" type="password" value="{{$admin->password}}">
                                </input>
                            </div> -->
                            <button class="btn btn-primary btn-lg btn-block" type="submit">
                                Update Profile
                            </button>
                        </form>
                    </ul>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>


                </div>
            </div>
            <!-- END LEFT COLUMN -->
        </div>
    </div>
</div>





@endsection