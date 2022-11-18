@include('partials.header')

<body>
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="new-list-container">
            <div class="header">
                <h1>New List</h1>
            </div>
            <div class="content">
                <div class="list-form">
                    <form class="form" method="POST" action="">
                        <div class="input">
                            {{ @csrf_field() }}
                            <h2>Name of List</h2>
                            <input type="text" name="name" />
                            <h2>Description</h2>
                            <textarea name="description" placeholder="Write your description here"></textarea>
                        </div>
                        <div class="new-list-btn">
                            <button class="save-btn">save</button>
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
