

<?php $__env->startSection('content'); ?>
    <section class="ftco-section">
        <div class="container">
            <!-- <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section"></h2>
                        </div>
                    </div> -->
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex" style="opacity: 0.9;">
                        <!-- <div class="img" style="background-image: url(style/images/bg-1.jpg);"> -->
                        <div class="img">
                            <img src="/img/login/Logo.jpg"
                                style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            margin-top: 20px;
                            width: 30%;">
                            <center>
                                <h2
                                    style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            margin-top: 10px;
                            width: 30%;
                            color: white;">
                                    SI-KIMR</h2>
                                <p class="text-white">Sistem Informasi <br>
                                    Kepatuhan Intern dan Manajemen Risiko<br>
                                <p class="text-white">Direktorat Jenderal Sumber Daya Air<br>
                                    Kementerian PUPR @2021</p>
                            </center>
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <?php if(Session::has('error')): ?>
                                <div class="row col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo e(Session::get('error')); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex">
                                <div class="w-100">
                                    <center>
                                        <h3 class="mb-4">Sign In</h3>
                                    </center>
                                </div>
                            </div>
                            <form method="POST" action="<?php echo e(route('logins')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input id="username" type="username"
                                        class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username"
                                        value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus
                                        placeholder="User Name">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                        required autocomplete="current-password" placeholder="Password">
                                </div>
                                <!-- <div class="form-group mb-3">
                                            <i class="fas fa-user"></i> &nbsp<label class="label" for="name">Username</label>
                                             <input id="username" type="username" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <i class="fas fa-key"></i> &nbsp<label class="label" for="password">Password</label>
                                             <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                                        </div> -->
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <p class="text-center"><a href="/">Kembali</a></p>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="style/js/jquery.min.js"></script>
    <script src="style/js/popper.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/main.js"></script>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\github reza\projek-sikimr\resources\views/auth/login.blade.php ENDPATH**/ ?>