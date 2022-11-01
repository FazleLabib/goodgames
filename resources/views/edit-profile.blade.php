<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Games</title>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
</head>
<body class="edit-profile">
    @if(isset(Auth::user()->email))
        <section class = "main">
            <nav>
                <a href = "/home" class = "logo">
                    <img src = "images/logo.png"/>
                </a>
                <ul class = "menu">
                    <li><a href = "profile">{{Auth::User()->name}}</a></li>
                    <li><a href = "/home">GAMES</a></li>
                    <li><a href = "/list">LISTS</a></li>
                    <li><a href = "/logout">LOGOUT</a></li>
                </ul>
            </nav>
        </section>
        <div class="edit-profile-container">
            <div class="header">
                <h1>Edit Profile</h1>
            </div>
            <div class="content">
                <div class="info-form">
                    <form class="form" method = "POST" action = "settings" enctype="multipart/form-data">
                        <div class = "input">
                            {{ @csrf_field() }}
                            {{ method_field('PUT') }}
                            <h2>Full Name</h2>
                            <input type="text" value="{{Auth::User()->name}}" name = "name" placeholder="{{Auth::User()->name}}"/>
                            <h2>Email Address</h2>
                            <input type="text" value="{{Auth::User()->email}}" name = "email" placeholder="{{Auth::User()->email}}"/>
                            <h2>New Password</h2>
                            <input type="password" name = "password" placeholder="Enter your new password here"/>
                            <h2>Change Profile Photo</h2>
                            <input type="file" name = "image"/>
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
                            <div class = "add-fav-card">
			                    <a href="#">
				                    <img src="images/default.jpg" alt="">
			                    </a>
		                    </div>
                            <div class = "add-fav-card">
			                    <a href="#">
				                    <img src="images/default.jpg" alt="">
			                    </a>
		                    </div>
                            <div class = "add-fav-card">
			                    <a href="#">
				                    <img src="images/default.jpg" alt="">
			                    </a>
		                    </div>
                            <div class = "add-fav-card">
			                    <a href="#">
				                    <img src="images/default.jpg" alt="">
			                    </a>
		                    </div>
                            <div class = "add-fav-card">
			                    <a href="#">
				                    <img src="images/default.jpg" alt="">
			                    </a>
		                    </div>
                        </div>
                    </div>
                    <!-- <div class="profile-pic">
                        <div class = "add-pic">
				            <img src="images/{{Auth::User()->image}}" alt="">
		                </div>
                        <a href="">
                            <h3>Change Profile Photo</h3>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
        @else
            <script>window.location="login";</script>
    @endif
</body>
</html>
