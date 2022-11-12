@include('partials.header')

<body class="edit-profile">
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="edit-profile-container">
            <div class="header">
                <h1>Edit Profile</h1>
            </div>
            <div class="content">
                <div class="info-form">
                    <form class="form" method="POST" action="settings" enctype="multipart/form-data">
                        <div class="input">
                            {{ @csrf_field() }}
                            {{ method_field('PUT') }}
                            <h2>Full Name</h2>
                            <input type="text" value="{{ Auth::User()->name }}" name="name"
                                placeholder="{{ Auth::User()->name }}" />
                            <h2>Email Address</h2>
                            <input type="text" value="{{ Auth::User()->email }}" name="email"
                                placeholder="{{ Auth::User()->email }}" />
                            <h2>New Password</h2>
                            <input type="password" name="password" placeholder="Enter your new password here" />
                            <h2>Change Profile Photo</h2>
                            <input type="file" name="image" />
                        </div>
                        <button class="save-btn">save changes</button>
                    </form>
                </div>
                <div class="add-fav">
                    <div class="cards-image">
                        <div class="fav-cards">
                            <div class="fav-header">
                                <h3>add favourite games</h3>
                            </div>
                            <div class="add-fav-grid">
                                @foreach ($favs as $fav)
                                    <div class="add-fav-card">
                                        <img src="images/{{ $fav->poster }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="search-fav">
                        <form action="">
                            <div class="search-form">
                                <input type="search" name="search" value="{{ $search }}" onfocus="this.value=''"
                                    placeholder="Find a Game">
                                <button class="search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="played-games">
                        <li class="game-box">
                            @foreach ($games as $game)
                                <ul>
                                    <h3>{{ $game->title }} ({{ $game->year }}) by {{ $game->developer }}</h3>
                                    @if ($game->favorite_flag == 0)
                                        <a href="/add-fav/{{ $game->id }}">
                                            @if ($favCount != 5)
                                                <button class="add-btn">add</button>
                                            @else
                                                <button class="add-btn" disabled>add</button>
                                            @endif
                                        </a>
                                    @else
                                        <a href="/remove-fav/{{ $game->id }}">
                                            <button class="remove-btn">remove</button>
                                        </a>
                                    @endif
                                </ul>
                            @endforeach
                        </li>
                    </div>
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
