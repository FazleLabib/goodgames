<nav>
    <a href = "/home" class = "logo">
        <img src = "/images/logo.png"/>
    </a>

    <ul class = "menu">
        <li><a href = "profile">{{Auth::User()->name}}</a></li>
        <li><a href = "home">GAMES</a></li>
        <li><a href = "list">LISTS</a></li>
        <li><a href = "logout">LOGOUT</a></li>
    </ul>
</nav>
