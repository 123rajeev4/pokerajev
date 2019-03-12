<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Pokerbyddyz</title>
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
	<link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}/public/img/logo-admin.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div style="background: #1c988c;
    color: white;" class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{ asset('/public/assets/images/white_logoo.png') }}" style="height:32px" alt="Klorofil Logo"></div>
								<p class="lead">Admin Login</p>
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
							<form class="form-auth-small" action="{{url('admin/login')}}" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" name="email" class="form-control" id="signin-email" placeholder="Email" value="{{old('email')}}">
									 @if ($errors->has('email'))
			                            <span class="help-block alert-danger">
			                            	<strong>{{ $errors->first('email') }}</strong>
			                        	</span>
			                        @endif
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control" id="signin-password" placeholder="Password" value="{{old('password')}}">
									@if ($errors->has('password'))
			                            <span class="help-block alert-danger">
			                             <strong>{{ $errors->first('password') }}</strong>
			                            </span>
			                        @endif
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="remember">
										<span>Remember me</span>
									</label>
								</div>
								<button style="background: white;color: #1c988c;" type="submit" class="btn btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a style="color: white;" href="<?= url('admin/forgot_password') ?>">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay" style="background: url(https://mobulous.app/healthapp/public/assets/images/slider-banner/1.png);background-repeat: no-repeat;
    background-size: 100% 100%;"></div>
						<div class="content text">
							<h1 class="heading" style="color:#1c988c;background:white;padding: 10px;
    font-size: 50px;
    border-radius: 25px;
    text-align: center;">Welcome Admin!</h1>
							<p></p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
