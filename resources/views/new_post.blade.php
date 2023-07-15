<html>
    <head>
        <title>Art</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="css/new_post.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src='{{ URL::to("js/new_post.js")}}' defer="true"></script>

        <title>Art</title>

    </head>

    <body>
    
        <header>
            <nav>
                
                <div id="logo">
                    Art
                </div>   
                    <div id="links">
                        <a href='/home'>HOME</a>
                        <a href='/logout' class='button'>LOGOUT</a>
                    </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

            </nav>




        </header>


        <section id="search">
            <form autocomplete="off">
                <h1>Clicca sull' immagine per condividere un nuovo post</h1>
                </br>
                </br>
                <h1>Cerca contenuti dei musei e delle gallerie d'Europa inserendo il nome dell'artista</h1>
                <div class="search">
                    <label for='search'>Cerca</label>
                    <input type='text' name="search" class="searchBar" placeholder="Es.Caravaggio">
                    <input type='submit' value="Cerca">
                </div>
            </form>



        </section>


        <section class="container">
            <div id="results">
               


            </div>


        </section>




        <section id="search_event">
            <form autocomplete="off">
                <h1>Cerca eventi inserendo la nazione</h1>
                <div class="search">
                    <label for='search'>Cerca</label>
                    <input type='text' name="search" class="searchBar" placeholder="Es.US">
                    <input type="submit" value="Cerca">

                </div>

            </form>
        </section>


        <section class="container2">
            <div id="result_event">  
                
            

            </div>
        </section>


        <footer>
            <nav>
                <div class="footer-container">
                    <div class="footer-col">
                        <h1>Giorgia Grazia Mucciarella O46002075</h1>
                    </div>
                </div>

            </nav>

        </footer>


    </body>









</html>