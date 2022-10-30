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
					@foreach($years as $year)
						<li> <a class="item" href="/home/year/{{$year['year']}}/">{{$year['year']}}</a> </li>
					@endforeach
    			</ul>
  			</li>
  			<li id = "menu-name"><a>GENRE</a>
    			<ul>
					@foreach($genres as $genre)
						<li><a class="item" href="/home/genre/{{$genre['genre']}}/">{{$genre['genre']}}</a></li>
					@endforeach
    			</ul>
  			</li>
  			<li id = "menu-name"><a>PLATFORM</a>
    			<ul>
					@foreach($platforms as $platform)
					<li><a class="item" href="/home/platform/{{$platform['platform']}}/">{{$platform['platform']}}</a></li>
					@endforeach
    			</ul>
  			</li>
		</ul>
	</section>

	<div class="game-grid">
		@foreach($posters as $poster)
			<div class = "game-card">
				<a href="#">
					<img src="images/{{$poster['poster']}}" alt="">
				</a>
			</div>
		@endforeach
	</div>
	
</body>
</html>