<html>
    <head>
        <link rel='stylesheet' href="<?php echo e(url('css/signup.css')); ?>">
        <script src='<?php echo e(URL::to("signup.js")); ?>' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta charset="utf-8">

        <title>Iscriviti - Art</title>
    </head>
    <body>
        <div id="logo">
            Art
        </div>
        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Iscriviti</h1>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                 <?php echo csrf_field(); ?>
                <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                        <input type='text' name='name' value='<?php echo e(old("name")); ?>' >
                        <div><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' value='<?php echo e(old("surname")); ?>' >
                        <div><span>Devi inserire il tuo cognome</span></div>
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' value='<?php echo e(old("username")); ?>'>
                    <div><span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email'  value='<?php echo e(old("email")); ?>'>
                    <div><span>Indirizzo email non valido</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password'  value='<?php echo e(old("password")); ?>'>
                    <div><span>Inserisci almeno 8 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password'  value='<?php echo e(old("confirm_password")); ?>'>
                    <div><span>Le password non coincidono</span></div>
                </div>
                <div class="fileupload">
                    <label for='avatar'>Scegli un'immagine profilo</label>
                        <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                        <div id="upload"><div class="file_name">Seleziona un file...</div><div class="file_size"></div></div>
                    <span>Le dimensioni del file superano 7 MB</span>
                </div>
               
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class='errorj'>
                    <img src='<?php echo e(URL::to("assets/close.svg")); ?>'/>
                    <span><?php echo e($error); ?></span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="<?php echo e(URL::to('login')); ?>">Accedi</a>
        </section>
        </main>
    </body>
</html><?php /**PATH C:\XAMPP\htdocs\laravel-tutorial\prog\resources\views/register.blade.php ENDPATH**/ ?>