@include('partials.header')

@if (isset(Auth::user()->email))
    <script>
        window.location = "home";
    </script>
@endif

<body class="landing-page">
    <section class="main">
        @include('partials.landing-navbar')
        <div class="heading">
            <h1>Log and rate games you've played.<br />Find your next favorite game.</h1>
            <a href='register'>
                <button class="get-started-btn" type="button">GET STARTED</button>
            </a>

        </div>
    </section>
    @include('partials.footer')
</body>

</html>
