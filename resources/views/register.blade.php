<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Games</title>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
</head>
@if(isset(Auth::user()->email))
        <script>window.location="home";</script>
@endif
<body class="login-page">
    @if($message = Session::get('msg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$message}}</strong>
        </div>
    @endif
    <div class="login-form">
        <h2>Create an account</h2>
            <form class="form" method="post" action="{{url('store')}}">
                {{csrf_field()}}
                <input type="text" name="fullname" placeholder="Full Name"/>
                <input type="text" name="email" placeholder="Email Address"/>
                <input type="password" name="password" placeholder="Password"/>
                <button class="login-btn" type="submit" name="register">JOIN NOW</button>
                <p class="message">Already have an account? <a href="login">Login here</a></p>
            </form>
    </div>
</body>
</html>
