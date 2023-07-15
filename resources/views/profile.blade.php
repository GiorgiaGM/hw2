<html>

    <head>
        <link rel='stylesheet' href="{{url('css/profile.css')}}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title>Art - {{$user->username}}</title>
    </head>

    <body>
    <div id="overlay"></div>
        <header>
            <nav>
                <div class="nav-container">
                    <div id="logo">
                         Art
                    </div>
                    <div id="links">
                        <a href='/home'>HOME</a>
                        <div id="separator"></div>
                        <a href='/logout' class='button'>LOGOUT</a>
                    </div>
                    <div id="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="userInfo">
                    <div class="avatar" style="background-image: url({{ $user->propic == null ? 'img/default_avatar.png' : $user->propic }})">
                    </div>
                    <h1>{{$user->username}}</h1>
                </div>               
            </nav>
        </header>

        <section class="container">

            <div id="results">
                
            </div>
    </section>

    </body>
</html>