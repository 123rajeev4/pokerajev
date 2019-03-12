@extends('layouts.admins')
@section('title', 'Edit User Details')
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
            User Profile
        </h3>
    </div>
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile-left">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay">
                </div>
                <div class="profile-main ">
                    <img alt="Avatar" class="img-circle img-circle_new"  src="{{$person['image']}}">
                        <h3 class="name">
                            {{$person['name']}}
                        </h3>
                    </img>
                </div>
            </div>
            <!-- END PROFILE HEADER -->
            <!-- PROFILE DETAIL -->
            <div class="profile-detail">
                <div class="profile-info">
                    <h4 class="heading">
                        Basic Info
                    </h4>
                    <ul class="list-unstyled list-justify">
                        <form action="{{url('admin/updateuserdetails')}}/{{$person['id']}}" class="form-auth-small" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label sr-only" for="signin-email">
                                    Upload Photo
                                </label>
                                <input class="form-control"  type="file" name="image">
                                </input>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="signin-email">
                                    Name
                                </label>
                                <input class="form-control"  placeholder="Name" name="name" type="text" value="{{$person['name']}}">
                                </input>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label sr-only" for="signin-email">
                                    Username
                                </label>
                                <input class="form-control"  placeholder="username" type="text" name="username" value="{{$person['username']}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="signin-password">
                                    Phone
                                </label>
                                <input class="form-control"  placeholder="Phone" name="phone" type="text" value="{{$person['phone']}}">
                                </input>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">
                                Update {{ucfirst($person['name'])}} Profile
                            </button>
                        </form>
                    </ul>
                </div>
            </div>
            <!-- END LEFT COLUMN -->
        </div>
    </div>
</div>



@endsection