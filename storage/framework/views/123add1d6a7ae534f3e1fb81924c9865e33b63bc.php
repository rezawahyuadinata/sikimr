<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(env('APP_NAME_FULL', 'Sistem Informasi Profil Perumahan')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?php echo e(asset('template')); ?>/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/adminlte/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/adminlte/plugins/sweetalert/lib/sweet-alert.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/adminlte/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .btn {
            border-radius: 0 !important;
        }

        .container {
            width: 100% !important;
        }

        .select2-container {
            width: 100% !important;
        }

        .error {
            color: red;
            padding-left: 5px;
        }

        .table td button {
            margin: 1px !important;
        }

        .modal-xl {
            width: 95%;
        }

        .sweet-overlay {
            z-index: 1999;
        }

        #modal-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            text-align: center;
            vertical-align: middle;
            padding-top: 100px;
            background: black;
            color: white;
            opacity: 0.7;
            display: none;
            z-index: 9999;
        }
    </style>
</head>

<body class="hold-transition skin-black layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
                            <b><?php echo e(config('app.name')); ?></b>
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                                <a href="<?php echo e(route('home')); ?>">
                                    <i class="fa fa-home"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="dropdown messages-menu faq">
                                <a href="#" onclick="faqModal()">
                                    <i class="fa fa-question-circle"></i>
                                    Faq
                                </a>
                            </li>
                            
                            <li class="dropdown messages-menu manual-book dropdown-menu-right">
                                <a href="#" class="btn dropdown-toogle" data-toggle="dropdown">
                                    <i class="fa fa-file-o"></i>
                                    Manual Book
                                    <span class="caret" style="margin: -2px 0 0 5px"></span>
                                </a>
                                <ul class="dropdown-menu open">
                                    <li>
                                        <a href="<?php echo e(url('/storage/manual_book/modul_ki.pdf')); ?>"
                                            download="Manual Book KI">KI</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/storage/manual_book/modul_mr.pdf')); ?>"
                                            download="Manual Book MR">Manajemen Risiko</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if($data->user->pengguna_foto): ?>
                                        <img src="<?php echo asset('/storage/uploads/images/user/' . $data->user->pengguna_foto); ?>" class="user-image" alt="<?php echo $data->user->name; ?>">
                                    <?php else: ?>
                                        <img src="https://pondokindahmall.co.id/assets/img/default.png"
                                            class="user-image" alt="<?php echo $data->user->name; ?>">
                                    <?php endif; ?>
                                    <span class="hidden-xs"><?php echo $data->user->name; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <?php if($data->user->pengguna_foto): ?>
                                            <img src="<?php echo asset('/storage/uploads/images/user/' . $data->user->pengguna_foto); ?>" class="img-circle" alt="<?php echo $data->user->name; ?>">
                                        <?php else: ?>
                                            <img src="https://pondokindahmall.co.id/assets/img/default.png"
                                                class="img-circle" alt="<?php echo $data->user->name; ?>">
                                        <?php endif; ?>
                                        <p>
                                            <?php echo $data->user->name; ?>
                                            <small><?php echo $data->user->pengguna_kategori->pengguna_kategori_nama; ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo e(route('profile')); ?>"
                                                class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="" class="btn btn-default btn-flat btn-logout">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="content-wrapper">
            <div class="container">
                <section class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </section>
            </div>
        </div>
        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b><a>SIMR 2021</a></b>
                </div>
                <strong>Copyright &copy; 2021 - <?php echo e(date('Y')); ?> </strong>
            </div>
        </footer>
    </div>

    <div id="modal-loading">
        <h3><i class="fa fa-spinner fa-spin fa-5x"></i></h3>
        <h3>Memperoses...</h3>
    </div>

    <?php echo $__env->make('layouts.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Contact Us</h4>
                    <p>Have any question or feedback?</p>
                    <?php if(Session::has('status')): ?>
                        <div class="alert alert-success"><?php echo e(Session::get('status')); ?></div>
                    <?php endif; ?>
                    <form action="" method="post">

                        <?php echo e(csrf_field()); ?>


                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="your name" />

                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email"
                            placeholder="your email address" />

                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" id="" placeholder="your message" cols="30"
                            rows="10"></textarea>
                        <form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/plugins/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/dist/js/adminlte.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/dist/js/demo.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/moment/min/moment.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>

    
    <link rel="stylesheet" href="<?php echo e(asset('js/plugins')); ?>/shepherd.css">
    <script src="<?php echo e(asset('js/plugins')); ?>/shepherd.js"></script>

    <!-- Morris charts -->
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/adminlte/bower_components/morris.js/morris.css">
    <!-- Morris.js charts -->
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/morris.js/morris.min.js"></script>

    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
    </script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/plugins/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/adminlte/bower_components/moment/min/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="<?php echo e(asset('js')); ?>/global.js"></script>

    <script type="text/javascript">
        var logoutUrl = '<?php echo e(route('logout')); ?>';
        var loginUrl = '<?php echo e(route('login')); ?>';
        var tutorial = '<?php echo e($data->user->tutorial_users == 0 ? true : false); ?>';

        $(document).ready(function() {
            $('.btn-logout').on('click', function(e) {
                e.preventDefault();

                swal({
                        title: "",
                        text: "Apakah Anda akan keluar dari aplikasi?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#e67e22",
                        cancelButtonText: "Tidak",
                        confirmButtonText: "Ya",
                        closeOnConfirm: false
                    },
                    function() {
                        $.ajax({
                            url: logoutUrl,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {},
                            beforeSend: function(data) {
                                $('#modal-loading').fadeIn('fast');
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function(data) {
                                location.reload();
                            },
                            complete: function(data) {
                                $('#modal-loading').fadeOut('fast');
                            }
                        })
                    });
            });
        });
    </script>


    <script src="<?php echo e(asset('js')); ?>/welcome.js"></script>
    <?php if(isset($data->javascript)): ?>
        <script src="<?php echo e(asset('js/')); ?>/<?php echo e($data->javascript); ?>.js"></script>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\Codes\Programs\sikimr\projek-sikimr\resources\views/layouts/modul.blade.php ENDPATH**/ ?>