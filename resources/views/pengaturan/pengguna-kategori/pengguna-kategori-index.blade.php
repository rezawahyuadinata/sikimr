@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="form-group col-sm-2">
        @isset($data->page->fitur->store)
            <label>&nbsp;</label>
            <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
                Tambah
            </button>
        @endisset
    </div>
    <div class="col-sm-3">
        
    </div>
    <div class="col-sm-12"></div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false">#</th>
                            <th data-orderable="true" data-data="pengguna_kategori_nama">Nama</th>
                            <th data-orderable="false"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-data-title">Form Hak Akses</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="pengguna_kategori_id" id="pengguna_kategori_id">
                    <div class="row">
                        <div class="form-group col-lg-6 form-hide">
                            <label for="pengguna_kategori_nama">Nama Hak Akses</label>
                            <input type="text" class="form-control" name="pengguna_kategori_nama" id="pengguna_kategori_nama">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-3 form-hide">
                            <label for="pengguna_kategori_status">Status</label><br>
                            <div class="radio">
                                <label for="aktif1">
                                    <input type="radio" name="pengguna_kategori_status" id="aktif1" value="1">
                                    Aktif
                                </label>
                            </div>
                            <div class="radio">
                                <label for="aktif0">
                                    <input type="radio" name="pengguna_kategori_status" id="aktif0" value="0">
                                    Tidak Aktif</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="name">Akses</label>
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="check_all">
                                    Ceklis Semua
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12" style="height: 400px; overflow: auto;">
                            <?php foreach ($data->modul_list as $key => $value): ?>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $key; ?>">
                                                    <?php echo $value->nama; ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-<?php echo $key; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                @if (isset($value->menu))
                                                    <?php foreach ($value->menu as $key_folder => $value_folder): ?>
                                                        <?php foreach ($value_folder->menu as $key_menu => $value_menu): ?>
                                                            <div class="form-group col-lg-3">
                                                                <label>
                                                                    <?php if ($value_menu->ikon): ?>
                                                                        <i class="<?php echo $value_menu->ikon; ?>"></i>
                                                                    <?php endif ?>
                                                                    <?php if ($value_folder->folder === true): ?>
                                                                        <?php echo $value_folder->nama; ?> <i class="fa fa-caret-right"></i>
                                                                    <?php endif ?>
                                                                    <?php echo $value_menu->nama; ?>
                                                                </label><br>
                                                                <?php foreach ($value_menu->fitur as $key_fitur => $value_fitur): ?>
                                                                    <?php if ($value_fitur->validasi === true): ?>
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" name="pengguna_kategori_akses[<?php echo $key; ?>][<?php echo $key_folder; ?>][<?php echo $key_menu; ?>][<?php echo $key_fitur; ?>]" id="<?php echo $key . '_' . $key_folder . '_' . $key_menu. '_' .$key_fitur; ?>" value="true">
                                                                                <?php echo $value_fitur->nama; ?>
                                                                            </label>
                                                                        </div>
                                                                    <?php endif ?>
                                                                <?php endforeach ?>
                                                            </div>
                                                        <?php endforeach ?>
                                                    <?php endforeach ?>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var urlData = '{{ route( $data->page->class . ".read") }}';
    var urlInsert = '{{ route( $data->page->class . ".store") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update") }}';
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
</script>
@endsection
