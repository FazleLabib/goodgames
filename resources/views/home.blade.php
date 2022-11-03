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
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="welcome-msg">
            <h1>Welcome back, <a href="profile">{{ Auth::User()->name }}</a>. Played anything recently?</h1>
        </div>
        <section id="primary_nav_wrap">
            <!-- <h3 id = "browse-by">Browse By</h3> -->
            <ul>
                <li id="menu-name"><a>YEAR</a>
                    <ul>
                        @foreach ($years as $year)
                            <li> <a class="item" href="?search={{ $year['year'] }}">{{ $year['year'] }}</a> </li>
                        @endforeach
                    </ul>
                </li>
                <li id="menu-name"><a>GENRE</a>
                    <ul>
                        @foreach ($genres as $genre)
                            <li><a class="item" href="?search={{ $genre['genre'] }}">{{ $genre['genre'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li id="menu-name"><a>PLATFORM</a>
                    <ul>
                        @foreach ($platforms as $platform)
                            <li><a class="item"
                                    href="?search={{ $platform['platform'] }}">{{ $platform['platform'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <form action="">
                <div class="search-form">
                    <input type="search" name="search" value="{{ $search }}" onfocus="this.value=''"
                        placeholder="Find a Game">
                    <button class="search-btn">Search</button>
                </div>
            </form>
        </section>

        <div class="game-grid">
            @foreach ($games as $game)
                <div class="game-card">
                    <a href="/game/{{ $game['id'] }}">
                        <img src="images/{{ $game['poster'] }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
        @include('partials.footer')
    @else
        <script>
            window.location = "login";
        </script>
    @endif
</body>

</html>
