<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $data->page->nama }} | {{ env('APP_NAME_FULL', 'Sistem Informasi Profil Perumahan') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('template') }}/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link rel="stylesheet"
        href="{{ asset('template') }}/adminlte/bower_components/font-awesome/css/font-awesome.min.css" media="all">
    <link rel="stylesheet" href="{{ asset('template') }}/adminlte/bower_components/Ionicons/css/ionicons.min.css"
        media="all">
    <link rel="stylesheet" href="{{ asset('template') }}/adminlte/bower_components/select2/dist/css/select2.min.css"
        media="all">
    {{-- catatan: <link rel="stylesheet" href="{{ asset('template') }}/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" media="all"> --}}
    <link rel="stylesheet" href="{{ asset('template') }}/adminlte/plugins/sweetalert/lib/sweet-alert.css"
        media="all">
    <link rel="stylesheet" href="{{ asset('template') }}/adminlte/dist/css/AdminLTE.min.css" media="all">
    <link rel="stylesheet" href="{{ asset('template') }}/adminlte/dist/css/skins/_all-skins.min.css" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.bootstrap.min.css" media="all">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        media="all">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

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

        .form-group {
            margin-bottom: 5px;
        }

        .form-control {
            height: 30px;
            padding: 6px 6px;
        }

        @media (max-width: 767px) {
            .skin-black .main-header .navbar .dropdown-menu li a {
                color: #333;
            }
        }
    </style>
</head>

<body class="hold-transition fixed skin-black sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header" style="height: 100px">
                        <a href="{{ route('home') }}" class="navbar-brand">
                            <!-- <b>SIKIMR</b> -->
                            <img src="/img/login/logo_sikimr.png"
                                style="display: block;
                            margin-top: 2px;
                            height: 70px;">
                        </a>
                        {{-- catatan: <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button> --}}
                    </div>
                    {{-- catatan: <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    @if ($data->user->pengguna_foto)
                                        <img src="<?php echo asset('storage/uploads/images/user/' . $data->user->pengguna_foto); ?>" class="user-image" alt="<?php echo $data->user->name; ?>">
                                    @else
                                        <img src="{{ asset('img/default.png') }}" class="user-image"
                                            alt="<?php echo $data->user->name; ?>">
                                    @endif
                                    <span class="hidden-xs"><?php echo $data->user->name; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        @if ($data->user->pengguna_foto)
                                            <img src="<?php echo asset('storage/uploads/images/user/' . $data->user->pengguna_foto); ?>" class="img-circle" alt="<?php echo $data->user->name; ?>">
                                        @else
                                            <img src="{{ asset('img/default.png') }}" class="img-circle"
                                                alt="<?php echo $data->user->name; ?>">
                                        @endif
                                        <p>
                                            <?php echo $data->user->name; ?>
                                            <small><?php echo $data->user->pengguna_kategori->pengguna_kategori_nama; ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ route('profile') }}"
                                                class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat btn-logout">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-th"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($data->modul as $key => $value)
                                        <li>
                                            <a href="{{ Route::has($value->route) ? route($value->route) : '#' }}">
                                                <h4>
                                                    <i class="{{ $value->ikon ? $value->ikon : 'fa fa-list' }}"></i>
                                                    {{ $value->nama }}
                                                </h4>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div> --}}
                    {{-- catatan: <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{ $data->page->modul == 'home' ? 'active' : '' }}">
                                <a href="{{ route('home') }}">
                                    Dashboard
                                </a>
                            </li>
                                @foreach ($data->modul as $item)
                                    @foreach ($item->menu as $key => $value)
                                        @if ($value->folder === true)
                                            <li class="dropdown {{ $key == $data->page->modul ? 'active' : '' }} ">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    {{ $value->nama }}
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                        @endif
                                        @foreach ($value->menu as $keys => $values)
                                            @if (!in_array($values->route, ['pemantauan-mr.index', 'tinjauan-mr.index', 'pemantauan-resiko.index']))
                                                <li
                                                    class="{{ $key == $data->page->modul && $keys == $data->page->class ? 'active' : '' }}">
                                                    <a
                                                        href="{{ Route::has($values->route) ? route($values->route) : '#' }}">
                                                        {{ $values->nama }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                        @if ($value->folder === true)
                            </ul>
                            </li>
                            @endif
                            @endforeach
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
            </nav>
        </header>

        <aside class="main-sidebar " style="padding-top:0px">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel" style="margin-top: 10px">
                    <div class="pull-left image">
                        @if ($data->user->pengguna_foto)
                            <img src="<?php echo asset('storage/uploads/images/user/' . $data->user->pengguna_foto); ?>" class="image-circle" alt="<?php echo $data->user->name; ?>">
                        @else
                            <img src="{{ asset('img/default.png') }}" class="image-circle" alt="<?php echo $data->user->name; ?>">
                        @endif
                    </div>

                    <div class="pull-left info">
                        <span class="hidden-xs mb-2" style="white-space: normal"><?php echo $data->user->name; ?></span>
                        <a href="#">
                            <p><i class="fa fa-circle text-success"></i> Online</p>
                        </a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{ $data->page->modul == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    @if (auth()->user()->level == 'UPR-T3' || auth()->user()->level == 'UPR-T2' || auth()->user()->level == 'UKI')
                        @foreach ($data->modul as $item)
                            @foreach ($item->menu as $key => $value)
                                @foreach ($value->menu as $keys => $values)
                                    @if (!in_array($values->route, ['pemantauan-mr.index', 'tinjauan-mr.index', 'pemantauan-resiko.index']))
                                        <li
                                            class="{{ $key == $data->page->modul && $keys == $data->page->class ? 'active' : '' }}">
                                            <a href="{{ Route::has($values->route) ? route($values->route) : '#' }}">
                                                <i class="{{ $values->ikon }}"></i><span
                                                    style="white-space: normal">{{ $values->nama }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @else
                        @foreach ($data->modul as $item)
                            @foreach ($item->menu as $key => $value)
                                @if ($value->folder === true)
                                    <li class="treeview {{ $key == $data->page->modul ? 'active' : '' }} ">
                                        <a href="#">
                                            <i class="{{ $value->ikon }}"></i>
                                            {{ $value->nama }}
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                @endif
                                @foreach ($value->menu as $keys => $values)
                                    @if (!in_array($values->route, ['pemantauan-mr.index', 'tinjauan-mr.index', 'pemantauan-resiko.index']))
                                        <li
                                            class="{{ $key == $data->page->modul && $keys == $data->page->class ? 'active' : '' }}">
                                            <a href="{{ Route::has($values->route) ? route($values->route) : '#' }}">
                                                <i
                                                    class="{{ !in_array($values->route, ['pemantauan-mr.index', 'tinjauan-mr.index', 'pemantauan-resiko.index']) ? '<?php $values->ikon; ?>' : 'fa fa-circle-o' }}"></i><span
                                                    style="white-space: normal; display:block">{{ $values->nama }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                                @if ($value->folder === true)
                </ul>
                </li>
                @endif
                @endforeach
                @endforeach
                @endif
                <li><a href="{{ route('profile') }}"><i
                            class="text-light glyphicon glyphicon-user"></i><span>Profile</span></a></li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Buku Manual</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ asset('/storage/dashboard/Modul_MR.pdf') }}"><i class="fa fa-circle-o"></i>Buku
                                Panduan MR</a>
                        </li>
                        <li><a href="{{ asset('/storage/dashboard/Modul_KI.pdf') }}"><i class="fa fa-circle-o"></i>Buku
                                Panduan KI</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#" class="btn-logout"><i
                            class="text-light glyphicon glyphicon-log-out"></i><span>LogOut</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper" style="padding-top: 100px">
            <div class="container">
                <section class="content-header">
                    <h1>
                        <!--<?php echo ($data->page->modul_folder === true ? $data->page->modul_nama . ' ' : '') . $data->page->class_nama; ?>-->
                        <?php echo $data->page->class_nama; ?>
                        <small><?php echo $data->page->class_deskripsi; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <?php if ($data->page->class != 'home'): ?>
                        <?php if ($data->page->modul_folder === true): ?>
                        <li><?php echo $data->page->modul_nama; ?></li>
                        <?php endif ?>
                        <?php if ($data->page->method == 'index'): ?>
                        <li class="active"><?php echo $data->page->class_nama; ?></li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <?php echo $data->page->class_nama; ?>
                            </a>
                        </li>
                        <li class="active"><?php echo $data->page->method_nama; ?></li>
                        <?php endif ?>
                        <?php endif ?>
                    </ol>
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </div>
        </div>

    </div>

    <div id="modal-loading">
        <h3><i class="fa fa-spinner fa-spin fa-5x"></i></h3>
        <h3>Loading...</h3>
    </div>

    <script src="{{ asset('template') }}/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/bower_components/moment/min/moment.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    {{-- catatan: <script src="{{ asset('template') }}/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('template') }}/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> --}}
    <script src="{{ asset('template') }}/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/plugins/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="{{ asset('template') }}/adminlte/plugins/input-mask/jquery.inputmask.numeric.extensions.js"></script>
    <script src="{{ asset('template') }}/adminlte/dist/js/adminlte.min.js"></script>
    <script src="{{ asset('template') }}/adminlte/dist/js/demo.js"></script>
    <script src="{{ asset('template') }}/adminlte/dist/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>


    <script type="text/javascript">
        var mainServerUrl = '{{ url('/') }}';
        var baseUrl = '{{ url($data->page->prefix . '/' . $data->page->class) }}';
        var logoutUrl = '{{ route('logout') }}'
        var loginUrl = '{{ route('login') }}';
        var assetUrl = '{{ asset('/') }}'

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
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="{{ asset('js') }}/global.js"></script>
    @if (isset($data->page->file_js))
        <script src="{{ asset('js/') }}/{{ $data->page->file_js }}.js"></script>
    @endif

    @stack('scripts')
</body>

</html>
