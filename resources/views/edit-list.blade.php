@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="new-list-container">
            <div class="header">
                <h1>Edit List</h1>
            </div>
            <div class="content">
                <div class="list-form">
                    <form class="form" method="POST" action="/lists/{{ $listInfo->id }}/edit"
                        enctype="multipart/form-data">
                        <div class="input">
                            {{ @csrf_field() }}
                            {{ method_field('PUT') }}
                            <h2>Name of List</h2>
                            <input type="text" value="{{ $listInfo->name }}" placeholder="{{ $listInfo->name }}"
                                name="name" />
                            <h2>Description</h2>
                            <textarea name="description" value="{{ $listInfo->description }}">{{ $listInfo->description }}</textarea>
                        </div>
                        <div class="new-list-btn">
                            <button class="save-btn">save</button>
                        </div>
                    </form>
                </div>
                <form action="">
                    <div class="edit-list-search list search-form">
                        <input type="search" name="search" value="{{ $search }}" onfocus="this.value=''"
                            placeholder="Find a List">
                        <button class="search-btn">search</button>
                    </div>
                </form>
                <div class="searched-box">
                    @if ($games != '')
                        @foreach ($games as $game)
                            <div class="searched-games">
                                <h3>{{ $game->title }} ({{ $game->year }}) by {{ $game->developer }}</h3>
                                <a href="/lists/{{ $listInfo->id }}/edit/addtoList?game_id={{ $game->id }}">
                                    <button class="add-btn">add</button>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="added-games">
                    <div class="header">
                        <h3>Games in this list</h3>
                    </div>
                    @foreach ($gamesInList as $gameInList)
                        <div class="game-container">
                            <div class="info">
                                <div class="poster">
                                    <img src="/images/{{ $gameInList->poster }}" alt="">
                                </div>
                                <div class="details">
                                    <h3>{{ $gameInList->title }}</h3>
                                    <h3 class="year">({{ $gameInList->year }})</h3>
                                </div>
                            </div>
                            <div class="remove-game">
                                <a href="/lists/{{ $listInfo->id }}/edit/removeFromList?game_id={{ $gameInList->game_id }}">
                                    <span class="fa-solid fa-xmark"></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
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
