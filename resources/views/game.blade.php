@include('partials.header')

<body>
    <section class="main">
        @include('partials.navbar')

        <div class="game-info">
            <div class="info-container">
                <img src="/images/{{ $gameInfo['poster'] }}" alt="">
                <div class="game-details">
                    <h2>{{ $gameInfo['title'] }}</h2>
                    <div class="other-details">
                        <h3 class="game-year">{{ $gameInfo['year'] }}</h3>
                        <h3 class="game-studio">By {{ $gameInfo['developer'] }}</h3>
                    </div>
                    <p class="game-description">{{ $gameInfo['description'] }}</p>
                    <div class="game-btn">
                        <a href='#'>
                            <button type="button" onclick="document.getElementById('id01').style.display='block'">log
                                game</button>
                        </a>
                        {{-- <a href='#'>
                            <button type="button">add to a list</button>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div id="id01" class="modal">
            <form class="modal-content animate" action="/game/{{ $gameInfo['id'] }}" method="POST">
                {{ csrf_field() }}
                <div class="container">
                    <div class="log-title-year">
                        <h3 class="log-game-title">{{ $gameInfo['title'] }}</h3>
                        <h3 class="log-game-year">{{ $gameInfo['year'] }}</h3>
                    </div>
                    <div class="log-rating-date">
                        <div class="rating-container">
                            <h3>Rating</h3>
                            <div id="half-stars">
                                <div class="rating-group">
                                    <input class="rating__input rating__input--none" checked name="rating2"
                                        id="rating2-0" value="0" type="radio" checked>
                                    <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                    <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                        for="rating2-05"><i
                                            class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-05" value="0.5"
                                        type="radio">
                                    <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-10" value="1"
                                        type="radio">
                                    <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                        for="rating2-15"><i
                                            class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-15" value="1.5"
                                        type="radio">
                                    <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-20" value="2"
                                        type="radio">
                                    <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                        for="rating2-25"><i
                                            class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-25" value="2.5"
                                        type="radio">
                                    <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-30" value="3"
                                        type="radio">
                                    <label aria-label="3.5 stars" class="rating__label rating__label--half"
                                        for="rating2-35"><i
                                            class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-35" value="3.5"
                                        type="radio">
                                    <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-40" value="4"
                                        type="radio">
                                    <label aria-label="4.5 stars" class="rating__label rating__label--half"
                                        for="rating2-45"><i
                                            class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-45" value="4.5"
                                        type="radio">
                                    <label aria-label="5 stars" class="rating__label" for="rating2-50"><i
                                            class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-50" value="5"
                                        type="radio">
                                </div>
                            </div>
                        </div>
                        <div class="date-container">
                            <h3>On</h3>
                            <input class="date-picker" type="date" id="log-date" name="log-date">
                        </div>
                    </div>
                    <div class="review">
                        <textarea name="review"placeholder="Write your review here"></textarea>
                    </div>
                    <input name="user_id" type="hidden" value="{{ Auth::User()->id }}">
                    <input name="game_id" type="hidden" value="{{ $gameInfo['id'] }}">
                    <div class="log-btn">
                        <button type="submit">save</button>
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancel-btn">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="user-reviews">
            <div class="header">
                <h3>user reviews</h3>
            </div>
            @foreach ($reviews as $review)
                <div class="user-info">
                    <img src="/images/{{ $review->image }}" alt="">
                    <h3 class="review-by">Review by</h3>
                    <h3 class="reviewer-name">{{ $review->name }}</h3>
                    <div id="half-stars">
                        <div class="rv-rating-group">
                            <span
                                class="rv-rating__label rv-rating__label--half fa fa-star-half
                        @if ($review->rating >= 0.5)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label fa fa-star
                        @if ($review->rating >= 1)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label rv-rating__label--half fa fa-star-half
                        @if ($review->rating >= 1.5)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label fa fa-star
                        @if ($review->rating >= 2)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label rv-rating__label--half fa fa-star-half
                        @if ($review->rating >= 2.5)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label fa fa-star
                        @if ($review->rating >= 3)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label rv-rating__label--half fa fa-star-half
                        @if ($review->rating >= 3.5)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label fa fa-star
                        @if ($review->rating >= 4)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label rv-rating__label--half fa fa-star-half
                        @if ($review->rating >= 4.5)
                            checked
                        @endif
                        "></span>
                            <span
                                class="rv-rating__label fa fa-star
                        @if ($review->rating >= 5)
                            checked
                        @endif
                        "></span>
                        </div>
                    </div>
                </div>
                <p>{{ $review->review }}</p>
                <div class="user-reviews-border"></div>
            @endforeach
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        @include('partials.footer')
    </section>
</body>

</html>
