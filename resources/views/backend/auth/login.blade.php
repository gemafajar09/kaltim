<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
	<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/css/font-awesome.css')}}" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">    
	<link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('/css/pages/signin.css')}}" rel="stylesheet" type="text/css">

</head>

<body>
	{{-- script --}}
	<script src="{{asset('/js/jquery-1.7.2.min.js')}}"></script>
	<script src="{{asset('/js/bootstrap.js')}}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="{{asset('/js/signin.js')}}"></script>

	{{-- content form login  --}}
	<div class="account-container">
		<div class="content clearfix">
			<form action="{{route('data-user-login')}}" method="post">
				@csrf
				<h1>Form Login</h1>		
				<div class="login-fields">
					<p>Please provide your details</p>
					<div class="field">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
					</div> 
					<div class="field">
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
					</div>
				</div> 
				<div class="login-actions">
					<span class="login-checkbox">
						<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4"/>
						<label class="choice" for="Field">Keep me signed in</label>
					</span>
					<button type="submit" class="button btn btn-success btn-large">Sign In</button>
				</div> 
			</form>
		</div>
	</div>

	{{-- pesan dari login --}}
	@if(session('error'))
		<script>
			toastr.error('{{session('error')}}')
		</script>
	@endif
	@if(session('pesan'))
		<script>
			toastr.info('{{session('pesan')}}')
		</script>
	@endif
</body>

</html>
