<html>
    <head>
        <link rel='stylesheet' href="<?php echo e(url('css/login.css')); ?>">

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
            
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class='error'><?php echo e($e); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <form name='login' method='post'>
            <?php echo csrf_field(); ?>
                <div class="username">
                    <label for='username'>Username</label>
                    <input id='username'type='text' name='username' value='<?php echo e(old("username")); ?>'>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input id='password'type='password' name='password'value='<?php echo e(old("password")); ?>' >
                </div>
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI">
                    </div>
                </div>
            </form>
            <div class="signup"><h4>Non hai un account?</h4></div>
            <div class="signup-btn-container"><a class="signup-btn" href="<?php echo e(URL::to('signup')); ?>">ISCRIVITI AD ART</a></div>
        </section>
        </main>
    </body>
</html><?php /**PATH C:\XAMPP\htdocs\hw2\prog\resources\views/login.blade.php ENDPATH**/ ?>