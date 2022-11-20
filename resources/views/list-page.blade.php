@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="specific-list">
            <div class="header">
                <h1>{{ $listInfo->name }}</h1>
                @if ($listInfo->user_id == Auth::user()->id)
                    <div class="edit-option">
                        <a href="/lists/{{ $listInfo->id }}/edit">
                            <span class=" edit-icon fa fa-pencil"></span>
                        </a>
                    </div>
                @endif
            </div>
            <div class="description">
                <p>{{ $listInfo->description }}</p>
            </div>
        </div>
        <div class="game-grid">
            @foreach ($games as $game)
                <div class="game-card">
                    <a href="/game/{{ $game->game_id }}">
                        <img src="/images/{{ $game->poster }}" alt="">
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
