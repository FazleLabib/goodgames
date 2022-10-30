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
<body class="landing-page">
    <section class = "main">
        <nav>
            <a href = "#" class = "logo">
                <img src = "images/logo.png"/>
            </a>

            <ul class = "menu"> 
                <li><a href = "login">SIGN IN</a></li>
                <li><a href = "register">REGISTER</a></li>
            </ul>
        </nav>
        <div class = "heading">
            <h1>Log and rate games you've played.<br />Find your next favorite game.</h1>
            <a href = 'register'>
                <button class="get-started-btn" type = "button">GET STARTED</button>
            </a>
            
        </div>
    </section>
</body>
</html>