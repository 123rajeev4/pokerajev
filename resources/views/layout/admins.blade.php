<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="{{url('/')}}/public/assets/images/white-logo.png" rel="shortcut icon" type="image/x-icon"></link>
        <title>@yield('title') | Escalate</title>
         @yield('styles')
         @include('include.admins.head')
    </head>
    <body>
        <div id="wrapper">
            @include('include.admins.sidebar')
            <div class="main" id="page-wrapper">
                @include('include.admins.header')
                 <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg)) <?php //$msg = 'success';?>
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} 
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </p>
                        @endif
                    @endforeach
                </div>
               
                <div class="wrapper wrapper-content animated fadeInRight">
                    {{ csrf_field() }}
                    @yield('content')
                </div>
            </div>
        </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#data').DataTable();
                } );
            </script>
            @section('scripts')
    </body>
</html>