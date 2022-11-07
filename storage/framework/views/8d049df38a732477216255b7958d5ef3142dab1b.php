<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php echo $__env->make('Home.components.home.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Bootstrap CSS -->
    <?php echo $__env->make('Home.components.home.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Home.components.home.script-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script-css'); ?>
</head>

<body class="index-page">
    <?php echo $__env->make('Home.components.home.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('section'); ?>
    <a href="#" class="to-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </a>
    <?php echo $__env->make('Home.components.home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('Home.components.home.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Home.components.home.script-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script-js'); ?>
</body>

</html>
<?php /**PATH D:\Codes\Programs\sikimr\projek-sikimr\resources\views/Home/layouts/layouthome.blade.php ENDPATH**/ ?>