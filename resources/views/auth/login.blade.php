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
					<p>Not Registered? <a href="#register">Create an Account</a></p>
				</div>
			</form>
			<!--login form end-->
			<!--signup form start-->
			@if (Route::has('register'))
			<form class="signup-form" action="{{route('register')}}" method="post">
				@csrf
				<i class="fas fa-user-plus"></i>
				<input class="user-input" type="text" name="name" placeholder="Name" required>
				@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
				<input class="user-input" type="email" name="email" placeholder="Email Address" autocomplete="off" required>
				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			@error('phone')
				<input class="user-input" type="text" name="phone" placeholder="phone" required>
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
				<select name="country" class="user-input select2" id="" style="margin-bottom:10px;">
					<option value="">Select country</option>
					@php
						$country = App\Models\Country::all();
					@endphp
					@forelse ($country as $item)
						<option value="{{$item->id}}">{{$item->name}}</option>

					@empty
						<option value="">No Country Found</option>
					@endforelse
				</select>
				@error('country')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
				<input class="user-input" type="password" name="password" style="margin-top:10px;" placeholder="Password" required>
				@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror

				<input class="user-input" type="password" name="password_confirmation" placeholder="Confirm password" required>
				<input class="btn" type="submit"  value="SIGN UP">
				<div class="options-02">
					<p>Already Registered? <a href="{{route('login')}}">Sign In</a></p>
				</div>
			</form>
			@endif
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