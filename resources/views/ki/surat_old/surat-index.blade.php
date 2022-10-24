@extends('layouts.layout_menu_all')

@section('content')
<style>
    #no_telp::-webkit-inner-spin-button,
    #no_telp::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<div class="row">
    <div class="form-group col-sm-2">
        @isset($data->page->fitur->create)
        <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
            Tambah
        </button>
        @endisset
    </div>
    <div class="col-sm-12"></div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <table id="table-data" class="display table table-striped table-hover datatable" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false" width="5%">#</th>
                            <th data-orderable="true">Tangal Surat</th>
                         
                            <th data-orderable="true">No Surat</th> 
                            <th data-orderable="true">Unit Pengirim</th>                  
                            <th data-orderable="true">Perihal</th>
                            <th data-orderable="true">Identitas Pelapor</th>
                            <th data-orderable="true">Entitas Pelapor</th>
                            <th data-orderable="true">Kata Kunci</th>
                          
                            <th data-orderable="false" width="80px;"></th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form class="form" id="form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-data-title">Pengaduan</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                    <div class="form-group col-lg-3 form-hide">
                            <label for="tgl_surat">Tanggal Surat*</label>
                            <input type="datetime-local" class="form-control" name="tgl_surat" id="tgl_surat">
                        </div>
                        <div class="form-group col-lg-3 form-hide">
                            <label for="tgl_terima">Tanggal Terima Surat*</label>
                            <input type="datetime-local" class="form-control" name="tgl_terima" id="tgl_terima">
                        </div>
                        <div class="form-group col-lg-3 form-hide">
                            <label for="no_surat">No Surat*</label>
                            <input type="text" class="form-control" name="no_surat" id="no_surat"
                                placeholder="Masukkan no surat">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="perihal">Perihal*</label>
                            <input type="text" class="form-control" name="perihal" id="perihal"
                                placeholder="Masukkan perihal">
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="identitas_pelapor">Identitas Pelapor*</label>
                            <input type="text" class="form-control" name="identitas_pelapor" id="identitas_pelapor"
                                placeholder="Masukkan Identitas Pelapor">
                        </div> 

                        <div class="form-group col-lg-6 form-hide">
                            <label for="entitas_pelapor">Entitas Pelapor*</label>
                            <select name="entitas_pelapor" id="entitas_pelapor" class="form-control select">
                                <option value="" selected>pilih</option>
                                <option value="Masyarakat">Masyarakat</option>
                                <option value="Lembaga Swadaya Masyarakat">Lembaga Swadaya Masyarakat</option>
                                <option value="Pengacara/lembaga Bantuan Hukum">Pengacara/lembaga Bantuan Hukum</option>
                                <option value="Aparat Penegak Hukum">Aparat Penegak Hukum</option>
                                <option value="Instansi Pemerintah Lainny">Instansi Pemerintah Lainnya</option>
                                <option value="Instansi Non Pemerintah">Instansi Non Pemerintah</option>
                                <option value="BUMN">BUMN</option>
                                <option value="BUMD">BUMD</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kata_kunci">Kata Kunci*</label>
                            <input type="text" class="form-control" name="kata_kunci" id="kata_kunci"
                                placeholder="Masukkan kata kunci">
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
    var roleCreateDetail = {{ isset($data->page->fitur->create_detail) ? 'true' : 'false' }};
</script>
@endsection