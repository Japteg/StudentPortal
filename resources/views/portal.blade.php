<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="{{ asset('js/app.js') }}" defer></script>
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,600i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="/styles/index.css"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <title>Student Portal</title>
</head>
<body>

  <h1 id="header">
    Student Portal
  </h1>

  <h3 id="tagline">
    Please login in order to view your accademic details.<br>
    If you are new here please take a moment to register with us.
  </h3>

  <div class="btncontainer">
      <input type="submit" class="btns" id="loginBtn" value="Login">

      <input type="submit" class="btns" id="signupBtn" value="Sign up">
  </div>

    <div class="formContainer" id="login">
      <H1>Login</H1>
      <form action="{{ route('login') }}" method="post" class="form" autocomplete="on">
        @csrf

        <input id="email" autocomplete="on" type="email" placeholder="E-mail" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="padding-left:20px;">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <input id="password" type="password" placeholder="Password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="padding-left:20px;">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror

          <div class="form-group row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember" style="color:white;">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </div>

        <button type="submit" class="btn btn-primary btn-big">
          {{ __('Login') }}
        </button>

      </form>
    </div>

    <div class="formContainer" id="signup">
      <H1>Sign up</H1>
      <form action="{{ route('register') }}" method="post" class="form" autocomplete="off">
        @csrf
        {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="padding-left:20px;">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          
        <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="padding-left:20px;">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input" placeholder="Password" name="password" required autocomplete="new-password" style="padding-left:20px;">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <input id="password-confirm" type="password" class="form-control input" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" style="padding-left:20px;">

          {{-- <input class="input" type="password" name="password" placeholder="Password"> --}}
          <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
      </form>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="{{asset('js/LandingPage.js')}}" charset="utf-8"></script>
</body>
</html>
