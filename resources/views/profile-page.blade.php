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
            @if (count($favs) == 0)
                <div class="add-fav-prompt">
                    <h3>Select your</h3>
                    <a href="settings">favorite games here!</a>
                </div>
            @else
                <div class="fav-games-grid">
                    @foreach ($favs as $fav)
                        <div class="fav-game-card">
                            <a href="/game/{{ $fav->id }}">
                                <img src="images/{{ $fav->poster }}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="recently-played">
            <div class="header">
                <h3>recently played</h3>
            </div>
            @foreach ($reviews as $review)
                <div class="rp-container">
                    <a href="game/{{ $review->id }}">
                        <img src="images/{{ $review->poster }}" alt="">
                    </a>
                    <div class="rp-review">
                        <div class="review-title-year">
                            <h3 class="rev-title">{{ $review->title }}</h3>
                            <h3 class="rev-year">{{ $review->year }}</h3>
                        </div>
                        <div class="rev-rating-date">
                            <div id="half-stars">
                                <div class="rv-rating-group">
                                    <span
                                        class="rv-rating__label rv-rating__label--half fa fa-star-half
                                    @if ($review->rating >= 0.5) checked @endif"></span>
                                    <span
                                        class="rv-rating__label fa fa-star
                                    @if ($review->rating >= 1) checked @endif"></span>
                                    <span
                                        class="rv-rating__label rv-rating__label--half fa fa-star-half
                                    @if ($review->rating >= 1.5) checked @endif"></span>
                                    <span
                                        class="rv-rating__label fa fa-star
                                    @if ($review->rating >= 2) checked @endif"></span>
                                    <span
                                        class="rv-rating__label rv-rating__label--half fa fa-star-half
                                    @if ($review->rating >= 2.5) checked @endif"></span>
                                    <span
                                        class="rv-rating__label fa fa-star
                                    @if ($review->rating >= 3) checked @endif"></span>
                                    <span
                                        class="rv-rating__label rv-rating__label--half fa fa-star-half
                                    @if ($review->rating >= 3.5) checked @endif"></span>
                                    <span
                                        class="rv-rating__label fa fa-star
                                    @if ($review->rating >= 4) checked @endif"></span>
                                    <span
                                        class="rv-rating__label rv-rating__label--half fa fa-star-half
                                    @if ($review->rating >= 4.5) checked @endif"></span>
                                    <span
                                        class="rv-rating__label fa fa-star
                                    @if ($review->rating >= 5) checked @endif"></span>
                                </div>
                            </div>
                            <h3>Played on {{ $review->date }}</h3>
                        </div>
                        <p>{{ $review->review }}</p>
                    </div>
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
