@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <section id="primary_nav_wrap">
            <ul>
                <li id="menu-name"><a>YEAR</a>
                    <ul>
                        @foreach ($years as $year)
                            <li> <a class="item" href="?search={{ $year->year }}">{{ $year->year }}</a> </li>
                        @endforeach
                    </ul>
                </li>
                <li id="menu-name"><a>GENRE</a>
                    <ul>
                        @foreach ($genres as $genre)
                            <li><a class="item" href="?search={{ $genre->genre }}">{{ $genre->genre }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li id="menu-name"><a>PLATFORM</a>
                    <ul>
                        @foreach ($platforms as $platform)
                            <li><a class="item" href="?search={{ $platform->platform }}">{{ $platform->platform }}</a>
                            </li>
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
        @if (count($games) == 0)
            <div class="no-games-lists-msg">
                <h3>Browse our home page and log games you've played, <a href="/home">here</a></h3>
            </div>
        @else
            <div class="game-grid">
                @foreach ($games as $game)
                    <div class="game-card">
                        <a href="/game/{{ $game->id }}">
                            <img src="/images/{{ $game->poster }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        @include('partials.footer')
    @else
        <script>
            window.location = "login";
        </script>
    @endif
</body>

</html>
