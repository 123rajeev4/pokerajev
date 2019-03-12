<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Forgot Password | Fametale</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('/public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/public/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/public/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('/public/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('/public/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/public/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/public/img/logo-admin.png') }}">
</head>

<body>
	<!-- WRAPPER -->
<!-- 
   @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif -->
      
 
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{ asset('/public/img/logo-admin.png') }}" style="height:32px" alt="Klorofil Logo"></div>
								<p class="lead">Admin Forgot Password</p>
							</div>
							<div class="flash-message">
			                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			                        @if(Session::has('alert-' . $msg))
			                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} 
			                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                            </p>
			                        @endif
			                    @endforeach
			                </div> <!-- end .flash-message -->
							<form class="form-auth-small" action="{{url('admin/forgot_password')}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" name="email" class="form-control" id="signin-email" placeholder="Email" value="{{old('email')}}">
									
									 @if ($errors->has('email'))
			                            <span class="help-block alert-danger">
			                            	<strong>{{ $errors->first('email') }}</strong>
			                        	</span>
			                        @endif
								</div> 
								<button type="submit" class="btn btn-primary btn-lg btn-block">Send Password</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Welcome Admin!</h1>
							<p></p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	sdfsdfsf
	<!-- END WRAPPER -->
</body>

</html>
