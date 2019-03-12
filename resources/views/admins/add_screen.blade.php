@extends('layout.admins') 
@section('title', 'User List')
@section('content')

<div class="row">
</div>

  @if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif

<div class="container">
        <div class="row">
        <form  action="{{url('admin/inert_ad')}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}
            <div class="col-md-8">
                <h1 class="text-center">Uploade New Advertisements<a style="float:right;margin-bottom:10px;" class="action_an btn btn-primary" href="{{url('admin/ad_list')}}" >
                                Back                                         
                                </a> </h1><br> 
 <input id="fileupload" type="file" value="{{$user->image}}" name="image"/>
       <hr />
     <b>Live Preview</b>
      <br />
      <br />
  <?php error_reporting(0);?>
    @if ($user->image)
  <div id='dvPreview'>
<img src="{{url('/')}}/public/adds/{{$user->image}}" width="200px" />
</div>
@else
     <div id="dvPreview">
     </div> 
@endif
<input type="hidden" name="hidden_id" value="{{$user->id}}">
<input type="hidden" name="hidden_image" value="{{$user->image}}">
     <div>
      <input type="submit" class="btn btn-primary" name="submit" value="submit">   
     </div>     
    </div>

    </form>
    </div>
    </div>
<div class="col-md-12">       
</div>

<script language="javascript" type="text/javascript">
window.onload = function () {
    var fileUpload = document.getElementById("fileupload");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.getElementById("dvPreview");
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "100";
                        img.width = "100";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
};
</script>
@endsection