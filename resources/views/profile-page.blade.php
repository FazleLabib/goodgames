@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="profile-header">
            <div class="profile-info">
                <img src="images/{{ Auth::User()->image }}" alt="">
                <div class="profile-name-btn">
                    <h2>{{ Auth::User()->name }}</h2>
                    <a href='settings'>
                        <button type="button">edit profile</button>
                    </a>
                </div>
            </div>
            <div class="profile-stats">
                <div class="games-played">
                    <a class="stat-home" href="home">
                        <h2>{{ $gameCount }}</h2>
                        <h3>games</h3>
                    </a>
                </div>
                <div class="profile-lists">
                    <a href="lists">
                        <h2>5</h2>
                        <h3>lists</h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="favourite-games">
            <div class="header">
                <h3>favourite games</h3>
            </div>
            <div class="fav-games-grid">
                <div class="fav-game-card">
                    <a href="#">
                        <img src="images/Witcher 3.png" alt="">
                    </a>
                </div>
                <div class="fav-game-card">
                    <a href="#">
                        <img src="images/discoelysium.png" alt="">
                    </a>
                </div>
                <div class="fav-game-card">
                    <a href="#">
                        <img src="images/godofwar.png" alt="">
                    </a>
                </div>
                <div class="fav-game-card">
                    <a href="#">
                        <img src="images/eldenring.png" alt="">
                    </a>
                </div>
                <div class="fav-game-card">
                    <a href="#">
                        <img src="images/hollowknight.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        @include('partials.footer')
    @else
        <script>
            window.location = "login";
        </script>
    @endif
</body>

</html>
