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

	<section id="primary_nav_wrap">
		<h3 id = "browse-by">Browse By</h3>
		<ul>
  			<li id = "menu-name"><a>YEAR</a>
    			<ul>
      				<li> <a class="item" href="/home/decade/2020s/"> 2020s </a> </li> 
      				<li> <a class="item" href="/home/decade/2010s/"> 2010s </a> </li> 
      				<li> <a class="item" href="/home/decade/2000s/"> 2000s </a> </li> 
      				<li> <a class="item" href="/home/decade/1990s/"> 1990s </a> </li> 
      				<li> <a class="item" href="/home/decade/1980s/"> 1980s </a> </li> 
      				<li> <a class="item" href="/home/decade/1970s/"> 1970s </a> </li> 
      				<li> <a class="item" href="/home/decade/1960s/"> 1960s </a> </li>
    			</ul>
  			</li>
  			<li id = "menu-name"><a>GENRE</a>
    			<ul>
      				<li><a class="item" href="/home/genre/action/">Action</a></li>
	  				<li><a class="item" href="/home/genre/adventure/">Adventure</a></li>
	  				<li><a class="item" href="/home/genre/rpg/">RPG</a></li>
    			</ul>
  			</li>
  			<li id = "menu-name"><a>PLATFORM</a>
    			<ul>
      				<li><a class="item" href="/home/platform/pc/">PC</a></li>
	  				<li><a class="item" href="/home/platform/nintendo/">Nintendo</a></li>
	  				<li><a class="item" href="/home/platform/console/">Console</a></li>
    			</ul>
  			</li>
		</ul>
	</section>

	<div class="game-grid">
		<div class = "game-card">
			<a href="#">
				<img src="images/Witcher 3.png" alt="">
			</a>
		</div>
		<div class ="game-card">
			<a href="#">
				<img src="images/discoelysium.png" alt="">
			</a>
		</div>
		<div class ="game-card">
			<a href="#">
				<img src="images/godofwar.png" alt="">
			</a>
		</div>
		<div class ="game-card">
			<a href="#">
				<img src="images/eldenring.png" alt="">
			</a>
		</div>
		<div class ="game-card">
			<a href="#">
				<img src="images/hollowknight.png" alt="">
			</a>
		</div>
		<div class ="game-card">
			<a href="#">
				<img src="images/inscryption.png" alt="">
			</a>
		</div>
		<div class ="game-card">
			<a href="#">
				<img src="images/rdr2.png" alt="">
			</a>
		</div>
	</div>
	
</body>
</html>