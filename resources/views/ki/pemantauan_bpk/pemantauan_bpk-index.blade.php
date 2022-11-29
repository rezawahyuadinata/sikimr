@extends('layouts.layout_menu_all')

@section('content')
    <div class="row">
        <div class="form-group col-sm-2">
            @isset($data->page->fitur->create)
                <label>&nbsp;</label>
                <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
                    Tambah
                </button>
            @endisset
        </div>
        <div class="col-sm-3">
            <label>&nbsp;</label>
            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#tesModal">
                Import Excel
            </button>
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
                                <center>
                                    <th data-orderable="false" colspan="15" style="background-color: green;">
                                        <center>DATABASE</center>
                                    </th>
                                    <th data-orderable="false" colspan="10" style="background-color: pink;">
                                        <center>STATUS SIPTL</center>
                                    </th>
                                    <th data-orderable="false" colspan="4" style="background-color: orange;">
                                        <center>VERIFIKASI ITJEN</center>
                                    </th>
                                    <th data-orderable="false" colspan="8" style="background-color: gray;">
                                        <center>TINDAK LANJUT BARU YANG AKAN DIAJUKAN VERIFIKASI KE ITJEN</center>
                                    </th>
                                    <th data-orderable="false" colspan="4" style="background-color: yellow;">
                                        <center>JANGKA WAKTU PENYELESAIAN TLRHP BPK RI</center>
                                    </th>
                                    <th data-orderable="false" colspan="6" style="background-color: yellow;">
                                        <center>KLASIFIKASI RENAKSI</center>
                                    </th>
                            </tr>
                            <tr>
                                <th data-orderable="true">No</th>
                                <th data-orderable="true">JUDUL MATRIKS</th>
                                <th data-orderable="true">NO LHP</th>
                                <th data-orderable="true">JENIS LHP</th>
                                <th data-orderable="true">JENIS TEMUAN</th>
                                <th data-orderable="true">REFF LHP</th>
                                <th data-orderable="true">REFF IDT</th>
                                <th data-orderable="true">TAHUN LHP</th>
                                <th data-orderable="true">JUDUL TEMUAN BESAR</th>
                                <th data-orderable="true">REKOMENDASI TEMUAN BESAR</th>
                                <th data-orderable="true">UNIT ORGANISASI</th>
                                <th data-orderable="true">UKER/UPT</th>
                                <th data-orderable="true">SATKER</th>
                                <th data-orderable="true">PROVINSI</th>
                                <th data-orderable="true">NILAI REKOMENDASI</th>
                                <th data-orderable="true">NILAI SS</th>
                                <th data-orderable="true">NILAI TPTD</th>
                                <th data-orderable="true">NILAI SISA</th>
                                <th data-orderable="true">URAIAN TINDAK LANJUT BPK</th>
                                <th data-orderable="true">STATUS SIPTL</th>
                                <th data-orderable="true">STATUS REKOMENDASI UNOR</th>
                                <th data-orderable="true">URAIAN KEKURANGAN TL BPK</th>
                                <th data-orderable="true">STATUS UPLOAD SIPTL</th>
                                <th data-orderable="true">STATUS FINALISASI SiPTL</th>
                                <th data-orderable="true">URAIAN KEKURANGAN DOKUMEN UPLOAD</th>
                                <th data-orderable="true">URAIAN VERIFIKASI</th>
                                <th data-orderable="true">NILAI MEMADAI</th>
                                <th data-orderable="true">STATUS VERIFIKASI</th>
                                <th data-orderable="true">CATATAN BELUM MEMADAI</th>
                                <th data-orderable="true">TL BARU DIAJUKAN VERIFIKASI ITJEN</th>
                                <th data-orderable="true">NILAI TL BARU DIAJUKAN VERIFIKASI ITJEN</th>
                                <th data-orderable="true">TL BARU VALIDASI UKI</th>
                                <th data-orderable="true">NILAI TL BARU VALIDASI UKI</th>
                                <th data-orderable="true">NILAI TOTAL TINDAK LANJUT</th>
                                <th data-orderable="true">STATUS TINDAK LANJUT SATKER</th>
                                <th data-orderable="true">SIFAT REKOMENDASI</th>
                                <th data-orderable="true">RENCANA AKSI</th>
                                <th data-orderable="true">DUE DATE RENAKSI</th>
                                <th data-orderable="true">Pendek (< 1 bulan)</th>
                                <th data-orderable="true">Menengah (1 sd 3 bln)</th>
                                <th data-orderable="true">Panjang (lebih dari 3 bulan)</th>
                                <th data-orderable="true">Dapat Ditindaklanjuti Sesuai Rencana Aksi</th>
                                <th data-orderable="true">Perlu Pembahasan Lebih Lanjut Dengan Pimpinan</th>
                                <th data-orderable="true">TPTD</th>
                                <th data-orderable="true">Tindak Lanjut Telah Disepakati Bersama BPK RI</th>
                                <th data-orderable="true">Dalam Proses Telaah BPK RI</th>
                                <th data-orderable="true">PEJABAT TERKAIT</th>
                                <th data-orderable="true">CATATAN PEMBAHASAN</th>
                                <th data-orderable="true">TL Sebelum KHP</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                                <th>13</th>
                                <th>14</th>
                                <th>15</th>
                                <th>16</th>
                                <th>17</th>
                                <th>18</th>
                                <th>19</th>
                                <th>20</th>
                                <th>21</th>
                                <th>22</th>
                                <th>23</th>
                                <th>24</th>
                                <th>25</th>
                                <th>26</th>
                                <th>27</th>
                                <th>28</th>
                                <th>29</th>
                                <th>30</th>
                                <th>31</th>
                                <th>32</th>
                                <th>33</th>
                                <th>34</th>
                                <th>35</th>
                                <th>36</th>
                                <th>37</th>
                                <th>38</th>
                                <th>39</th>
                                <th>40</th>
                                <th>41</th>
                                <th>42</th>
                                <th>43</th>
                                <th>44</th>
                                <th>45</th>
                                <th>46</th>
                                <th>47</th>
                                <th>48</th>
                                <th>49</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- catatan: import Modal --}}
    <div class="modal fade" id="tesModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header-->
                <div class="modal-header">
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Import Excel</h4>
                </div>
                <!--body-->
                <div class="modal-body">
                    <form>
                        <input type="hidden" class="form-control" name="token" id="token_excel"
                            value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" class="form-control" name="file" id="file_excel"
                                placeholder="Input File .xls">
                        </div>
                    </form>
                    <br>
                    <br>
                    <a class="btn btn-primary" href="{{ url('') }}/ki/template/pemantauan_bpk/download">Download
                        Template</a>
                </div>
                <!--footer-->
                <div class="modal-footer">
                    <button class="btn btn-success" onclick="uploadExcel()">Upload</button>
                    <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-data-title">Form Pemantauan LHP BPK RI Ditjen SDA</h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <div class="row">
                            <div class="form-group col-lg-6 form-hide">
                                <label for="judul_matriks">JUDUL MATRIKS</label>
                                <input type="text" class="form-control" name="judul_matriks" id="judul_matriks"
                                    placeholder="Masukkan judul_matriksR">
                            </div>

                            <div class="form-group col-lg-6 form-hide">
                                <label for="no_lhp">Nomor LHP BPK</label>
                                <input type="text" class="form-control" name="no_lhp" id="no_lhp"
                                    placeholder="Masukkan Nomor LHP BPK">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 form-hide">
                                <label for="jenis_lhp">JENIS LHP</label>
                                <input type="text" class="form-control" name="jenis_lhp" id="jenis_lhp"
                                    placeholder="Masukkan Tahun">
                            </div>

                            <div class="form-group col-lg-6 form-hide">
                                <label for="jenis_temuan">JENIS TEMUAN</label>
                                <input type="text" class="form-control" name="jenis_temuan" id="jenis_temuan"
                                    placeholder="Masukkan Jenis Temuan">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-lg-6 form-hide">
                                <label for="reff_lhp">REFF LHP</label>
                                <input type="text" class="form-control" name="reff_lhp" id="reff_lhp"
                                    placeholder="Masukkan reff_lhp">
                            </div>

                            <div class="form-group col-lg-6 form-hide">
                                <label for="ref_idt">REFF IDT</label>
                                <input type="text" class="form-control" name="ref_idt" id="ref_idt"
                                    placeholder="Masukkan ref_idt">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-lg-2 form-hide">
                                <label for="tahun_lhp">TAHUN LHP</label>
                                <input type="number" class="form-control" name="tahun_lhp" id="tahun_lhp"
                                    placeholder="Masukkan tahun_lhp">
                            </div>

                            <div class="form-group col-lg-10 form-hide">
                                <label for="judul_temuan_besar">JUDUL TEMUAN BESAR</label>
                                <input type="text" class="form-control" name="judul_temuan_besar"
                                    id="judul_temuan_besar" placeholder="Masukkan judul_temuan_besar" row="3">
                            </div>
                        </div>


                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-bold">Status Tindak Lanjut Rekomendasi Belum Sesuai</h3>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="rekomendasi_temuan">REKOMENDASI TEMUAN BESAR</label>
                                <input type="text" class="form-control" name="rekomendasi_temuan"
                                    id="rekomendasi_temuan" placeholder="Masukkan rekomendasi_temuan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 form-hide">
                                <label for="unit_organisasi">UNIT ORGANISASI</label>
                                <input type="text" class="form-control" name="unit_organisasi" id="unit_organisasi"
                                    placeholder="Masukkan unit_organisasi">
                            </div>
                            <div class="form-group col-lg-3 form-hide">
                                <label class="control-label">Unit Kerja</label>
                                <select name="upt_id" id="upt_id" class="form-control select2 unitkerja">
                                    <option value="">- Pilih -</option>
                                    @foreach (DB::table('eselon-2')->get() as $item)
                                        <option value="{{ $item->ID }}" data-pejabat="{{ $item->PEJABAT }}"
                                            data-jabatan="{{ $item->JABATAN }}" data-nip="{{ $item->NIP }}">
                                            {{ $item->NAMA }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 form-hide">
                                <label class="control-label">Satker</label>
                                <select name="satker_id" id="satker_id" class="form-control select2 satker">
                                    <option value="">- Pilih Satker -</option>
                                    @foreach (DB::table('satker')->get() as $item)
                                        <option value="{{ $item->ID }}">{{ $item->NAMA }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-2 form-hide">
                                <label for="provinsi">PROVINSI</label>
                                <input type="text" class="form-control" name="provinsi" id="provinsi"
                                    placeholder="provinsi">
                            </div>
                            <div class="form-group col-lg-3 form-hide">
                                <label for="nilai_rekomendasi">NILAI REKOMENDASI</label>
                                <input type="number" class="form-control" name="nilai_rekomendasi"
                                    id="nilai_rekomendasi" placeholder="Masukkan nilai_rekomendasi">
                            </div>
                        </div>
                        <hr>
                        <!-- STATUS SIPTL -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-bold"> STATUS SIPTL </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 form-hide">
                                <label for="nilai_ss">NILAI SS</label>
                                <input type="number" class="form-control" name="nilai_ss" id="nilai_ss"
                                    placeholder="Masukkan nilai_ss">
                            </div>
                            <div class="form-group col-lg-4 form-hide">
                                <label for="nilai_tptd">NILAI TPTD</label>
                                <input type="text" class="form-control" name="nilai_tptd" id="nilai_tptd"
                                    placeholder="Masukkan nilai_tptd">
                            </div>
                            <div class="form-group col-lg-4 form-hide">
                                <label for="nilai_sisa">NILAI SISA</label>
                                <input type="text" class="form-control" name="nilai_sisa" id="nilai_sisa"
                                    placeholder="Masukkan nilai_sisa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="uraian_tl_bpk">URAIAN TINDAK LANJUT BPK</label>
                                <input type="text" class="form-control" name="uraian_tl_bpk" id="uraian_tl_bpk"
                                    placeholder="Masukkan uraian_tl_bpk">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3 form-hide">
                                <label for="status_siptl">STATUS SIPTL</label>
                                <!-- <input type="text" class="form-control" name="status_siptl" id="status_siptl" placeholder="Masukkan status_siptl"> -->
                                <select name="status_siptl" id="status_siptl" class="form-control select2">
                                    <option>SUDAH SESUAI (SS)</option>
                                    <option>BELUM SESUAI (BS)</option>
                                    <option>BELUM TINDAK LANJUT </option>
                                    <option>TIDAK DAPAT DITINDAKLANJUTI (TD)</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 form-hide">
                                <label for="status_tekomendasi_unor">STATUS REKOMENDASI UNOR</label>

                                <select name="status_tekomendasi_unor" id="status_tekomendasi_unor"
                                    class="form-control select2">
                                    <option>SESUAI</option>
                                    <option>BELUM SESUAI</option>
                                    <option>BELUM DITINDAKLANJUTI</option>
                                    <option>TIDAK DAPAT DITINDAKLANJUTI</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 form-hide">
                                <label for="uraian_kekurangan_tl">URAIAN KEKURANGAN TINDAK LANJUT BPK</label>
                                <input type="text" class="form-control" name="uraian_kekurangan_tl"
                                    id="uraian_kekurangan_tl" placeholder="Masukkan uraian_kekurangan_tl">
                            </div>
                            <div class="form-group col-lg-6 form-hide">
                                <label for="status_upload_siptl">STATUS UPLOAD SIPTL</label>
                                <input type="text" class="form-control" name="status_upload_siptl"
                                    id="status_upload_siptl" placeholder="Masukkan status_upload_siptl">
                            </div>

                            <div class="form-group col-lg-6 form-hide">
                                <label for="status_finalisasi_siptl">STATUS FINALISASI SIPTL</label>
                                <input type="text" class="form-control" name="status_finalisasi_siptl"
                                    id="status_finalisasi_siptl" placeholder="Masukkan status_finalisasi_siptl">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="uraian_kekurangan_dokumen">URAIAN KEKURANGAN DOKUMEN UPLOAD</label>
                                <input type="text" class="form-control" name="uraian_kekurangan_dokumen"
                                    id="uraian_kekurangan_dokumen" placeholder="Masukkan uraian kekurangan_dokumen">
                            </div>
                        </div>

                        <!-------------------------- Verifikasi ITjen -------------------------------->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-bold"> VERIFIKASI ITJEN </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="uraian_verifikasi">URAIAN VERIFIKASI</label>
                                <input type="text" class="form-control" name="uraian_verifikasi"
                                    id="uraian_verifikasi" placeholder="Masukkan uraian_verifikasi">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 form-hide">
                                <label for="nilai_memadai">NILAI MEMADAI</label>
                                <input type="text" class="form-control" name="nilai_memadai" id="nilai_memadai"
                                    placeholder="Masukkan nilai_memadai">
                            </div>

                            <div class="form-group col-lg-6 form-hide">
                                <label for="status_verifikasi">STATUS VERIFIKASI</label>
                                <select name="status_verifikasi" id="status_verifikasi" class="form-control select2">
                                    <option>Belum Memadai</option>
                                    <option>Memadai</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="catatan_belum_memadai">CATATAN BELUM MEMADAI</label>
                                <input type="text" class="form-control" name="catatan_belum_memadai"
                                    id="catatan_belum_memadai" placeholder="Masukkan catatan_belum_memadai">
                            </div>
                        </div>


                        <!-- TINDAK LANJUT BARU YANG AKAN DIAJUKAN VERIFIKASI KE ITJEN							 -->

                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-bold"> TINDAK LANJUT BARU YANG AKAN DIAJUKAN VERIFIKASI KE ITJEN </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-10 form-hide">
                                <label for="tl_baru_diajukan_verifikasi_itjen">TL BARU DIAJUKAN VERIFIKASI ITJEN</label>
                                <input type="text" class="form-control" name="tl_baru_diajukan_verifikasi_itjen"
                                    id="tl_baru_diajukan_verifikasi_itjen"
                                    placeholder="Masukkan tl_baru_diajukan_verifikasi_itjen">
                            </div>

                            <div class="form-group col-lg-2 form-hide">
                                <label for="nilai_tl_baru_diajukan_itjen">NILAI </label>
                                <input type="text" class="form-control" name="nilai_tl_baru_diajukan_itjen"
                                    id="nilai_tl_baru_diajukan_itjen" placeholder="Masukkan nilai_tl_baru_diajukan_itjen">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-10 form-hide">
                                <label for="tl_baru_validasi_uki">TL BARU VALIDASI UKI</label>
                                <input type="text" class="form-control" name="tl_baru_validasi_uki"
                                    id="tl_baru_validasi_uki" placeholder="Masukkan tl_baru_validasi_uki">
                            </div>

                            <div class="form-group col-lg-2 form-hide">
                                <label for="nilai_tl_baru_validasi_uki">NILAI </label>
                                <input type="text" class="form-control" name="nilai_tl_baru_validasi_uki"
                                    id="nilai_tl_baru_validasi_uki" placeholder="Masukkan nilai_tl_baru_validasi_uki">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-2 form-hide">
                                <label for="nilai_total_tl">NILAI TOTAL TINDAK LANJUT</label>
                                <input type="text" class="form-control" name="nilai_total_tl" id="nilai_total_tl"
                                    placeholder="Masukkan nilai_total_tl">
                            </div>

                            <div class="form-group col-lg-2 form-hide">
                                <label for="status_tl_satker">STATUS TINDAK LANJUT SATKER</label>
                                <select name="status_tl_satker" id="status_tl_satker" class="form-control select2">
                                    <option>MEMADAI</option>
                                    <option>BELUM MEMADAI</option>
                                    <option>BELUM TINDAK LANJUT</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-8 form-hide">
                                <label for="sifat_rekomendasi">SIFAT REKOMENDASI</label>
                                <input type="text" class="form-control" name="sifat_rekomendasi"
                                    id="sifat_rekomendasi" placeholder="Masukkan sifat_rekomendasi">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="rencana_aksi">RENCANA AKSI</label>
                                <input type="text" class="form-control" name="rencana_aksi" id="rencana_aksi"
                                    placeholder="Masukkan rencana_aksi">
                            </div>
                        </div>

                        <!-- JANGKA WAKTU PENYELESAIAN TLRHP BPK RI									 -->

                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-bold"> JANGKA WAKTU PENYELESAIAN TLRHP BPK RI </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3 form-hide">
                                <label for="duedate_renaksi">DUE DATE RENAKSI</label>
                                <input type="date" class="form-control" name="duedate_renaksi" id="duedate_renaksi"
                                    placeholder="Masukkan duedate_renaksi">
                            </div>

                            <div class="form-group col-lg-3 form-hide">
                                <label for="penyelesaian_bpk_pendek">Pendek (< 1 bulan)</label>
                                        <input type="text" class="form-control" name="penyelesaian_bpk_pendek"
                                            id="penyelesaian_bpk_pendek" placeholder="Masukkan penyelesaian_bpk_pendek">
                            </div>

                            <div class="form-group col-lg-3 form-hide">
                                <label for="penyelesaian_bpk_menengah">Menengah (1 sd 3 bln)</label>
                                <input type="text" class="form-control" name="penyelesaian_bpk_menengah"
                                    id="penyelesaian_bpk_menengah" placeholder="Masukkan penyelesaian_bpk_menengah">
                            </div>

                            <div class="form-group col-lg-3 form-hide">
                                <label for="penyelesaian_bpk_panjang">Panjang (lebih dari 3 bulan)</label>
                                <input type="text" class="form-control" name="penyelesaian_bpk_panjang"
                                    id="penyelesaian_bpk_panjang" placeholder="Masukkan penyelesaian_bpk_panjang">
                            </div>
                        </div>

                        <!-- KLASIFIKASI RENAKSI				 -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-bold"> KLASIFIKASI RENAKSI </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="klasren_dapat_tl">Dapat Ditindaklanjuti Sesuai Rencana Aksi</label>
                                <input type="text" class="form-control" name="klasren_dapat_tl" id="klasren_dapat_tl"
                                    placeholder="Masukkan klasren_dapat_tl">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="klasren_pembahasan_tl">Perlu Pembahasan Lebih Lanjut Dengan Pimpinan</label>
                                <input type="text" class="form-control" name="klasren_pembahasan_tl"
                                    id="klasren_pembahasan_tl" placeholder="Masukkan klasren_pembahasan_tl">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="klasren_tptd">TPTD</label>
                                <input type="text" class="form-control" name="klasren_tptd" id="klasren_tptd"
                                    placeholder="Masukkan klasren_tptd">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="klasren_tl_disepakati">Tindak Lanjut Telah Disepakati Bersama BPK RI</label>
                                <input type="text" class="form-control" name="klasren_tl_disepakati"
                                    id="klasren_tl_disepakati" placeholder="Masukkan klasren_tl_disepakati">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="klasren_tptd">Dalam Proses Telaah BPK RI</label>
                                <input type="text" class="form-control" name="klasren_proses_telaah"
                                    id="klasren_proses_telaah" placeholder="Masukkan klasren_proses_telaah">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="pejabat_terkait">Pejabat Terkait</label>
                                <input type="text" class="form-control" name="pejabat_terkait" id="pejabat_terkait"
                                    placeholder="Masukkan pejabat_terkait">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="catatan_pembahasan">Catatan Pembahasan</label>
                                <input type="text" class="form-control" name="catatan_pembahasan"
                                    id="catatan_pembahasan" placeholder="Masukkan catatan_pembahasan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="tl_sebelum_khp">TL sebelum KHP</label>
                                <input type="text" class="form-control" name="tl_sebelum_khp" id="tl_sebelum_khp"
                                    placeholder="Masukkan tl_sebelum_khp">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-default d-none" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var urlData = '{{ route($data->page->class . '.read') }}';
        var urlInsert = '{{ route($data->page->class . '.store') }}';
        var urlUpdate = '{{ route($data->page->class . '.update') }}';
        var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
        var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
        var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
    </script>
@endsection
