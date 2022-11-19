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
                        <h2>{{ $listCount }}</h2>
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
                    <div id="{{ $review->id }}" class="modal">
                        <form class="modal-content animate" action="/profile/edit-log/{{ $review->id }}"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="container">
                                <div class="log-title-year">
                                    <h3 class="log-game-title">{{ $review->title }}</h3>
                                    <h3 class="log-game-year">{{ $review->year }}</h3>
                                </div>
                                <div class="log-rating-date">
                                    <div class="rating-container">
                                        <h3>Rating</h3>
                                        <div id="half-stars">
                                            <div class="rating-group">
                                                <label aria-label="0 stars" class="rating__label"
                                                    for="rating2-0">&nbsp;</label>
                                                <input class="rating__input rating__input--none" name="rating2"
                                                    id="rating2-0" value="0" type="radio"
                                                    @if ($review->rating == 0) checked @endif>

                                                <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                                    for="rating2-05"><i
                                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-05"
                                                    value="0.5" type="radio"
                                                    @if ($review->rating > 0) checked @endif>

                                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-10"
                                                    value="1" type="radio"
                                                    @if ($review->rating > 0.5) checked @endif>

                                                <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                                    for="rating2-15"><i
                                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-15"
                                                    value="1.5" type="radio"
                                                    @if ($review->rating > 1) checked @endif>

                                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-20"
                                                    value="2" type="radio"
                                                    @if ($review->rating > 1.5) checked @endif>

                                                <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                                    for="rating2-25"><i
                                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-25"
                                                    value="2.5" type="radio"
                                                    @if ($review->rating > 2) checked @endif>

                                                <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-30"
                                                    value="3" type="radio"
                                                    @if ($review->rating > 2.5) checked @endif>

                                                <label aria-label="3.5 stars"
                                                    class="rating__label rating__label--half" for="rating2-35"><i
                                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-35"
                                                    value="3.5" type="radio"
                                                    @if ($review->rating > 3) checked @endif>

                                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-40"
                                                    value="4" type="radio"
                                                    @if ($review->rating > 3.5) checked @endif>

                                                <label aria-label="4.5 stars"
                                                    class="rating__label rating__label--half" for="rating2-45"><i
                                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-45"
                                                    value="4.5" type="radio"
                                                    @if ($review->rating > 4) checked @endif>

                                                <label aria-label="5 stars" class="rating__label" for="rating2-50"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-50"
                                                    value="5" type="radio"
                                                    @if ($review->rating > 4.5) checked @endif>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="date-container">
                                        <h3>On</h3>
                                        <input class="date-picker" type="date" id="log-date" name="log-date"
                                            placeholder="{{ $review->date }}" value="{{ $review->date }}">
                                    </div>
                                </div>
                                <div class="review">
                                    <textarea name="review" value="{{ $review->review }}">{{ $review->review }}</textarea>
                                </div>
                                <div class="modal-btn">
                                    <div class="log-btn">
                                        <button type="submit">update</button>
                                        <a href="/profile/delete-log/{{ $review->id }}">
                                            <button type="button" class="delete-btn">delete</button>
                                        </a>
                                    </div>
                                    <div class="log-btn">
                                        <button type="button"
                                            onclick="document.getElementById({{ $review->id }}).style.display='none'"
                                            class="cancel-btn">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
                    <div class="edit-option">
                        <span class=" edit-icon fa fa-pencil"
                            onclick="document.getElementById({{ $review->id }}).style.display='block'"></span>
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
