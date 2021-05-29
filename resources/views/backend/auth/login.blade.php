<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<style>
	body {
	background-image: url("{{asset('/img/bg33.jpg')}}");
	background-size:cover;
	width: 100%;
  height: auto;
	/* background-repeat: repeat-y; */
	}
</style>

<body>
	{{-- script --}}
	<script src="{{asset('/js/jquery-1.7.2.min.js')}}"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!-- <script src="{{asset('/js/signin.js')}}"></script> -->

	{{-- content form login  --}}
	<div class="container">
		<div class="row" style="margin-top: 13em; ">
		<!-- <center>
			<h3>Direktorat Lalulintas Polda Kalimantan Timur</h3>
		</center> -->
			<div class="card peach-gradient color-block mb-3 mx-auto" style="width: 350px;">
				<div class="card-body">
					<form action="{{route('data-user-login')}}" method="post">
						@csrf
						<h4 style="text-align:center">Form Login</h4>		
						<div class="">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" id="username" name="username" value="" placeholder="Username" class="form-control" />
							</div> 
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" id="password" name="password" value="" placeholder="Password" class="form-control"/>
							</div>
						</div> 
						<div class="">
							<!-- <span class="login-checkbox">
								<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4"/>
								<label class="choice" for="Field">Keep me signed in</label>
							</span> -->
							<div align="right">
								<button type="submit" class="button btn btn-info btn-block">Sign In</button>
							</div>
						</div> 
					</form>
				</div>
			</div>
		</div>
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
