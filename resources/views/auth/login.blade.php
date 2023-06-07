<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Responsive Login Page</title>
		<link rel="stylesheet" href="{{asset('auth/style.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
		<link rel="stylesheet" href="{{asset('admin/assets/css/select2.min.css')}}">

	</head>
	<style>
		.invalid-feedback{
			color: red;
			font-weight: lighter;
		}
	</style>
	<body>

		<!--form area start-->
		<div class="form">
			<!--login form start-->
			<form class="login-form" action="{{route('login')}}" method="post">
				@csrf
				<i class="fas fa-user-circle"></i>
				<input class="user-input" type="text" name="email" placeholder="Username" required>
				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
				<input class="user-input" type="password" name="password" placeholder="Password" required>
				 @error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
				<div class="options-01">
					<label class="remember-me"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
					<a href="#">Forgot your password?</a>
				</div>
				<input class="btn" type="submit" name="" value="LOGIN">
				<div class="options-02">
					<p>Not Registered? <a href="{{route('register')}}">Create an Account</a></p>
				</div>
			</form>
			<!--login form end-->
			<!--signup form start-->

			<!--signup form end-->
		</div>
		<!--form area end-->
		<script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('admin/assets/js/select2.min.js')}}"></script>
		<script type="text/javascript">
		$('.options-02 a').click(function(){
			$('form').animate({
				height: "toggle", opacity: "toggle"
			}, "slow");
		});

		 $(function () {
				$('.select2').select2({
					placeholder: 'Select Country'
				});
			});
		</script>
	</body>
</html>
