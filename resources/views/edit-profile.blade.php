@include('partials.header')

<body class="edit-profile">
    @if (isset(Auth::user()->email))
        <section class="main">
            @include('partials.navbar')
        </section>
        <div class="edit-profile-container">
            <div class="header">
                <h1>Edit Profile</h1>
            </div>
            <div class="content">
                <div class="info-form">
                    <form class="form" method="POST" action="settings" enctype="multipart/form-data">
                        <div class="input">
                            {{ @csrf_field() }}
                            {{ method_field('PUT') }}
                            <h2>Full Name</h2>
                            <input type="text" value="{{ Auth::User()->name }}" name="name"
                                placeholder="{{ Auth::User()->name }}" />
                            <h2>Email Address</h2>
                            <input type="text" value="{{ Auth::User()->email }}" name="email"
                                placeholder="{{ Auth::User()->email }}" />
                            <h2>New Password</h2>
                            <input type="password" name="password" placeholder="Enter your new password here" />
                            <h2>Change Profile Photo</h2>
                            <input type="file" name="image" />
                        </div>
                        <button class="save-btn">save changes</button>
                    </form>
                </div>
                <div class="cards-image">
                    <div class="fav-cards">
                        <div class="fav-header">
                            <h3>add favourite games</h3>
                        </div>
                        <div class="add-fav-grid">
                            <div class="add-fav-card">
                                <a href="#">
                                    <img src="images/default.jpg" alt="">
                                </a>
                            </div>
                            <div class="add-fav-card">
                                <a href="#">
                                    <img src="images/default.jpg" alt="">
                                </a>
                            </div>
                            <div class="add-fav-card">
                                <a href="#">
                                    <img src="images/default.jpg" alt="">
                                </a>
                            </div>
                            <div class="add-fav-card">
                                <a href="#">
                                    <img src="images/default.jpg" alt="">
                                </a>
                            </div>
                            <div class="add-fav-card">
                                <a href="#">
                                    <img src="images/default.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
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
