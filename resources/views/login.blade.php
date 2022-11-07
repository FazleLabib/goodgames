@include('partials.header')

@if(isset(Auth::user()->email))
        <script>window.location="home";</script>
@endif
<body class="login-page">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$message}}</strong>
        </div>
    @endif -->

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error')}}
        </div>
    @endif
    <div class="login-form">
        <h2>Sign in</h2>
            <form class="form" method = "post" action = "{{url('checklogin')}}">
                {{ @csrf_field() }}
                <input type="text" name = "email" placeholder="Email Address"/>
                <input type="password" name = "password" placeholder="Password"/>
                <button class="login-btn">LOGIN NOW</button>
                <p class="message">Not registered? <a href="register">Create an account</a></p>
            </form>
    </div>
</body>
</html>
