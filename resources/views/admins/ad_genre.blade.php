@extends('layouts.admins') 
@section('title', 'Add Genre')
@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text-center">Add New Topics<a style="float:right;margin-bottom:10px;" class="action_an btn btn-primary" href="{{url('admin/genre_list')}}" >
                                Back                                         
                                </a> </h1><br> 
                                 
                    
  <form action="{{url('admin/uploadTopic')}}" method="post">
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
    <input type="submit" class="form-control" value="submit">
    </div>
  
  </form>                
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
   
@endsection