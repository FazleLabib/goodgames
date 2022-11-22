@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="new-list-container">
            <div class="header">
                <h1>Edit Review</h1>
            </div>
            <div class="content">
                <div class="edit-list-form">
                    @foreach ($reviews as $review)
                        <form class="form" method="POST" action="/profile/{{ $review->id }}/edit-review"
                            enctype="multipart/form-data">
                            <div class="input">
                                {{ @csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="edit-review-title-year">
                                    <h3 class="title">{{ $review->title }}</h3>
                                    <h3 class="year">({{ $review->year }})</h3>
                                </div>
                                <div class="log-rating-date">
                                    <div class="edit rating-container">
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

                                                <label aria-label="3.5 stars" class="rating__label rating__label--half"
                                                    for="rating2-35"><i
                                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-35"
                                                    value="3.5" type="radio"
                                                    @if ($review->rating > 3) checked @endif>

                                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating2" id="rating2-40"
                                                    value="4" type="radio"
                                                    @if ($review->rating > 3.5) checked @endif>

                                                <label aria-label="4.5 stars" class="rating__label rating__label--half"
                                                    for="rating2-45"><i
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
                                    <div class="edit-date date-container">
                                        <h3>On</h3>
                                        <input class="date-picker" type="date" id="log-date" name="log-date"
                                            placeholder="{{ $review->date }}" value="{{ $review->date }}">
                                    </div>
                                </div>
                                <h3 class="edit-review">Review</h3>
                                <textarea name="review" value="{{ $review->review }}">{{ $review->review }}</textarea>
                            </div>
                    @endforeach
                    <div class="edit-review-btn new-list-btn">
                        <div class="btn-group">
                            <button class="save-btn">save</button>
                            <a href="/profile/{{ $review->id }}/delete-review">
                                <button type="button" class="delete-btn">delete</button>
                            </a>
                        </div>
                        <a href="/profile">
                            <button type="button" class="cancel-btn">cancel</button>
                        </a>
                    </div>
                    </form>
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
