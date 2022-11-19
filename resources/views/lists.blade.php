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
                    <input type="search" name="search" value="{{ $search }}" onfocus="this.value=''" placeholder="Find a List">
                    <button class="search-btn">Search</button>
                </div>
            </form>
        </section>
        @foreach ($lists as $list)
            <div class="list-content">
                <div class="poster-collection">
                    <a href="lists/{{ $list->list_id }}">
                        <img src="images/animalcrossing.png" alt="">
                        <img src="images/breathOfTheWild.png" alt="">
                        <img src="images/gta-san-andreas.png" alt="">
                        <img src="images/inscryption.png" alt="">
                        <img src="images/la-noire.png" alt="">
                    </a>
                </div>
                <div class="info">
                    <h3 class="list-title">{{ $list->title }}</h3>
                    <h3 class="list-user-info">{{ $list->name }}</h3>
                    <p class="list-description">{{ $list->description }}</p>
                </div>
            </div>
        @endforeach
        @include('partials.footer')
    @else
        <script>
            window.location = "login";
        </script>
    @endif
</body>

</html>
