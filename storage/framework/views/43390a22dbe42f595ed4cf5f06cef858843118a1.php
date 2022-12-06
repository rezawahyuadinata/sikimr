<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/fontawesome-free/css/all.css')); ?>" rel="stylesheet">
    <style>
        #bgimage {
            background-image: url('<?php echo e(asset('img/login/bg_login.png')); ?>');
            background-repeat: repeat;
            /* position: fixed; */
            width: 100%;
            height: 100%;
            background-size: 100%;
        }
    </style>
</head>

<body id="bgimage">
    <div id="app">

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <script src="<?php echo e(asset('js')); ?>/global.js"></script>
    <script src="<?php echo e(asset('js/register-index.js')); ?>"></script>
    <script>
        var urlRegister = '<?php echo e(route('registers.store')); ?>';
    </script>
</body>


</html>
<?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/layouts/app-login.blade.php ENDPATH**/ ?>