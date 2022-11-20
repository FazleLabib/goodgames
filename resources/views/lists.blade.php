@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="list-welcome-msg">
            <h1>Lists are the best way of collecting, keeping track of games you like or want to play.</h1>
            <h1>Create your own list <a href="/lists/new">here</a>.</h1>
        </div>
        <section id="primary_nav_wrap">
            <form action="">
                <div class="list search-form">
                    <input type="search" name="search" value="{{ $search }}" onfocus="this.value=''"
                        placeholder="Find a List">
                    <button class="search-btn">Search</button>
                </div>
            </form>
        </section>
        @for ($i = 0; $i < count($lists); $i++)
            <div class="list-content">
                <div class="poster-collection">
                    <a href="lists/{{ $lists[$i]->list_id }}">
                        @if (isset($games[$i][0]) && $lists[$i]->list_id == $games[$i][0]->list_id)
                            @for ($j = 0; $j < 5; $j++)
                                @if (isset($games[$i][$j]))
                                    <img src="images/{{ $games[$i][$j]->poster }}" alt="">
                                @else
                                    <img src="images/default.jpg" alt="">
                                @endif
                            @endfor
                        @else
                            @for ($j = 0; $j < 5; $j++)
                                <img src="images/default.jpg" alt="">
                            @endfor
                        @endif
                    </a>
                </div>
                <div class="list-content-item info">
                    <h3 class="list-title">{{ $lists[$i]->title }}</h3>
                    <h3 class="list-user-info">{{ $lists[$i]->name }}</h3>
                    <p class="list-description">{{ $lists[$i]->description }}</p>
                </div>
            </div>
        @endfor
        @include('partials.footer')
    @else
        <script>
            window.location = "login";
        </script>
    @endif
</body>

</html>
