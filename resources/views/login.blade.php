<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoodGames</title>
    <link href="{{ asset('/css/login-styles.css') }}" rel="stylesheet">
</head>
<body>
    <h2>Sign in</h2>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action = "login" method = "POST">
                @csrf
                <input type="text" name = "email" placeholder="Email Address"/>
                <input type="password" name = "password" placeholder="Password"/>
                <button>LOGIN NOW</button>
                <p class="message">Not registered? <a href="register">Create an account</a></p>
            </form>
        </div>
    </div>
</body>
</html>
