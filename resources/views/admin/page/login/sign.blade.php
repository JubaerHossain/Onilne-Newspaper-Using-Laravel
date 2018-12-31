<!DOCTYPE HTML>
<html>

<head>
    <title>Youth Club | Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Tool Sign In Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Stylesheets -->
    <link href="{{asset('assets/backend/login')}}/css/style.css" rel='stylesheet' type='text/css' />
    <!--// Stylesheets -->
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <!--//fonts-->
</head>

<body background="{{asset('assets/backend/login')}}/images/b.jpg">
<h1>Admin Sign In</h1>
<div class="w3ls-login box box--big">

    <!-- form starts here -->
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="agile-field-txt">
            <label> {{ __('E-Mail Address') }}</label>
            <input type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="agile-field-txt">
            <label> {{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
            <div class="agile_label">
                <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
                <label class="check" for="check3">Show password</label>
            </div>
            <div class="agile-right">
                <a href="#">forgot password?</a>
            </div>
        </div>
        <!-- script for show password -->
        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <!-- //end script -->
        <div class="w3ls-bot">
            <div class="switch-agileits">
                <label class="switch">
                    <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>


                        <span class="slider round"></span>
                    keep me signed in
                </label>
            </div>
        </div>
        <input type="submit" value="SIGN IN">
    </form>
</div>
<!-- //form ends here -->
<!--copyright-->
<div class="copy-wthree">
    <p>© 2018 Youth Club . All Rights Reserved</p>
</div>
<!--//copyright-->
</body>
</html>
