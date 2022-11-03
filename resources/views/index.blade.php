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
        @include('partials.landing-navbar')
        <div class = "heading">
            <h1>Log and rate games you've played.<br />Find your next favorite game.</h1>
            <a href = 'register'>
                <button class="get-started-btn" type = "button">GET STARTED</button>
            </a>

        </div>
    </section>
</body>
</html>
