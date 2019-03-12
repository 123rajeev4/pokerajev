@extends('layouts.admins') 
@section('title', 'Ads List')
@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8">
               <form>  
                <h1 class="text-center">Uploade New Advertisements<a style="float:right;margin-bottom:10px;" class="action_an btn btn-primary" href="{{url('admin/ad_list')}}" >
                                Back                                         
                                </a> </h1><br> 
                                
                     <input type="text" name="">            
                    <div class="form-group">
                        <div class="file-loading">
                            <input id="image-file" type="file" name="file" accept="*" data-min-file-count="1" multiple>


                        </div>
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
    <script type="text/javascript">
        $("#image-file").fileinput({
            theme: 'fa',
            uploadUrl: "{{route('image.upload')}}",
            uploadExtraData: function() {
                return {
                    _token: "{{ csrf_token() }}",
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif','jpeg','mp4'],
            overwriteInitial: false,
            //maxFileSize:2048,
            //maxFilesNum: 10
        });
    </script>
@endsection