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
    <!--login form end-->
    <!--signup form start-->
    <form class="signup-form" method="POST" action="{{ route('register') }}">
        @csrf
        <i class="fas fa-user-plus"></i>
        <input id="name" type="text" class="user-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
        @enderror
        <input id="email" type="email" class="user-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
        @enderror
        <input class="user-input @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="phone" value="{{ old('phone') }}" >
        @error('phone')
        <span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
        @enderror
        <select name="country_id" class="user-input  @error('country_id') is-invalid @enderror select2" id="" style="margin-bottom:10px;">
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

        @error('country_id')
        <span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
        @enderror
        <input class="user-input" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="margin-top:10px;">
        @error('password')
        <span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
        @enderror

        <input id="password-confirm" type="password" class="user-input" name="password_confirmation" required autocomplete="new-password">

        <input class="btn" type="submit"  value="SIGN UP">
        <div class="options-02">
            <p>Already Registered? <a href="{{route('login')}}">Sign In</a></p>
        </div>
    </form>
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


