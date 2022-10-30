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
    <div class="login-form">
        <h2>Create an account</h2>
            <form class="form">
                <input type="text" placeholder="Email Address"/>
                <input type="text" placeholder="Username"/>
                <input type="password" placeholder="Password"/>
                <button class="login-btn">JOIN NOW</button>
                <p class="message">Already have an account? <a href="login">Login here</a></p>
            </form>
    </div>
</body>
</html>
