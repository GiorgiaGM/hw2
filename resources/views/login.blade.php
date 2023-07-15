<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/login.css') }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accedi - Art</title>
    </head>
    <body>
        <div id="logo">
            Art
        </div>
        <main class="login">
        <section class="main">
            <h5>Per continuare, accedi ad Art</h5>
            
            @foreach($errors->all() as $e)
                <p class='error'>{{ $e }}</p>
            @endforeach

            <form name='login' method='post'>
            @csrf
                <div class="username">
                    <label for='username'>Username</label>
                    <input id='username'type='text' name='username' value='{{ old("username") }}'>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input id='password'type='password' name='password'value='{{ old("password") }}' >
                </div>
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI">
                    </div>
                </div>
            </form>
            <div class="signup"><h4>Non hai un account?</h4></div>
            <div class="signup-btn-container"><a class="signup-btn" href="{{ URL::to('signup') }}">ISCRIVITI AD ART</a></div>
        </section>
        </main>
    </body>
</html>