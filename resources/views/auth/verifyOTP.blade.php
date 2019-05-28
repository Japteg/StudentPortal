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
      You are almost there. Please enter the OTP send to your<br>
      registered E-mail id. 
  </h3>


    <div class="formContainer">
      <form action="{{ route('checkOTP') }}" method="post" class="form" autocomplete="on">
        @csrf

        <input id="otp" autocomplete="on" type="text" placeholder="Enter OTP" class="input form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autofocus style="padding-left:20px;">
          @error('otp')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror


        <button type="submit" class="btn btn-primary btn-big">
          {{ __('Submit') }}
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
