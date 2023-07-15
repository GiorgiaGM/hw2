<html>

  <head>
    <title>Art</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('css/home.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src='<?php echo e(URL::to("home.js")); ?>' defer="true"></script>
  </head>
  
  <body>
    <div id="overlay" class="hidden">
    </div>
    <header>
      <nav>
        <div id="logo">
          Art
        </div>
        <div id="links">
          <a href='/profile'>PROFILO</a>
          <a href ='/new_post' class='button'>NEW POST</a>
          <a href='/logout' class='button'>LOGOUT</a>
        </div>
        <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>
      <div class="userInfo">
          <div class="avatar" style="background-image: url(<?php echo e($user->propic == null ? 'assets/default_avatar.png' : $user->propic); ?>)">
          </div>
          <h1><?php echo e($user->username); ?></h1>
      </div>     
      <h1>Alla scoperta dell'arte</h1>
      <a class="subtitle">
        Con Art puoi condividere opere ed eventi nel mondo
      </a>
    </header>
    <section id="new_post">
      
        
        
          
   
          
        
     <div id="modale" class="hidden"></div>
      
    </section>

    
    <section id="new_event">
      
        
        
          
   
          
        
     <div id="modale" class="hidden"></div>
      
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
  </html><?php /**PATH C:\XAMPP\htdocs\laravel-tutorial\prog\resources\views/home.blade.php ENDPATH**/ ?>