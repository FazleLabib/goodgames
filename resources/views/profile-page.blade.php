<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Games</title>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <section class = "main">
        <nav>
            <a href = "/home" class = "logo">
                <img src = "images/logo.png"/>
            </a>

            <ul class = "menu"> 
                <li><a href = "profile">PROFILE</a></li>
                <li><a href = "home">GAMES</a></li>
                <li><a href = "list">LISTS</a></li>
                <li><a href = "search">SEARCH</a></li>
            </ul>
        </nav>
    </section>
    <div class="profile-header">
        <div class="profile-info">
            <img src="images/dndln.jpg" alt="">
            <div class="profile-name-btn">
                <h2>Dandelion</h2>
                <a href = 'edit-profile'>
                    <button type = "button">edit profile</button>
                </a>
            </div>
        </div>
        <div class="profile-stats">
            <div class="games-played">
                <a class="stat-home" href="home">
                    <h2>200</h2>
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
        <div class="fav-games-grid">
            <div class = "fav-game-card">
			    <a href="#">
				    <img src="images/Witcher 3.png" alt="">
			    </a>
		    </div>
            <div class = "fav-game-card">
			    <a href="#">
				    <img src="images/discoelysium.png" alt="">
			    </a>
		    </div>
            <div class = "fav-game-card">
			    <a href="#">
				    <img src="images/godofwar.png" alt="">
			    </a>
		    </div>
            <div class = "fav-game-card">
			    <a href="#">
				    <img src="images/eldenring.png" alt="">
			    </a>
		    </div>
            <div class = "fav-game-card">
			    <a href="#">
				    <img src="images/hollowknight.png" alt="">
			    </a>
		    </div>
        </div>
    </div>
</body>
</html>