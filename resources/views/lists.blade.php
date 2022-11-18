@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="welcome-msg">
            <h1>Hey, <a href="profile">{{ Auth::User()->name }}</a>. Create your own list <a href="/lists/new">here</a>.</h1>
        </div>
        @include('partials.footer')
    @else
        <script>
            window.location = "login";
        </script>
    @endif
</body>

</html>
