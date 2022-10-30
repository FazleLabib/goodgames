<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Games</title>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <section class = "main">
        <nav>
            <a href = "/home" class = "logo">
                <img src = "/images/logo.png"/>
            </a>

            <ul class = "menu"> 
                <li><a href = "profile">PROFILE</a></li>
                <li><a href = "home">GAMES</a></li>
                <li><a href = "list">LISTS</a></li>
                <li><a href = "search">SEARCH</a></li>
            </ul>
        </nav>
    </section>

    <div class="game-info">
        <div class="info-container">
            <img src="/images/{{$gameInfo['poster']}}" alt="">
            <div class="game-details">
                <h2>{{$gameInfo['title']}}</h2>
                <div class="other-details">
                    <h3 class="game-year">{{$gameInfo['year']}}</h3>
                    <h3 class="game-studio">By {{$gameInfo['developer']}}</h3>
                </div>
                <p class="game-description">{{$gameInfo['description']}}</p>
            <div class="game-btn">
                <a href = '#'>
                    <button type = "button">log game</button>
                </a>
                <a href = '#'>
                    <button type = "button">add to a list</button>
                </a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>