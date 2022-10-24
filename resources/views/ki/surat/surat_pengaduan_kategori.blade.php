<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block"
            onclick="addData('#modal-pengaduan_kategori', '#form-pengaduan_kategori')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-pengaduan_kategori" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Integritas</th>
                    <th data-orderable="true">Perencanaan</th>
                    <th data-orderable="true">Pembebasan</th>
                    <th data-orderable="true">Tender</th>
                    <th data-orderable="true">Pelaksanaan</th>
                    <th data-orderable="true">Pemanfaatan</th>
                    <th data-orderable="true">Status</th>
                    <th data-orderable="true">Keterangan</th>
                    <th data-orderable="true">Pendampingan</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-pengaduan_kategori" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-pengaduan_kategori">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-pengaduan_kategori-title">Bidang Pengaduan</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="pengaduan_kategori_id" required>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="integritas">Integritas*</label>
                            <select name="integritas" id="integritas" class="form-control select">
                                <option value="" selected>pilih</option>
                                <option value="Korupsi" >Korupsi</option>
                                <option value="Kolusi" >Kolusi</option>
                                <option value="Nepotisme">Nepotisme</option>
                                <option value="Komisi">Komisi/Fee (Kick Back)</option>
                                <option value="Suap">Suap (Bribery)</option>
                                <option value="hadiah">Pemberian Hadiah (Gift)</option>
                                <option value="Lifestyle">Gaya Hidup Mewah (Lifestyle)</option>
                                <option value="tidak_jujur">Panitia Lelang Tidak Jujur</option>
                                <option value="Lainnya">Indikasi Calon Pemenang Lelang Diarahkan Oleh Pihak Tertentu</option>
                                <option value="panita_tertutup">Panitia Lelang Bersifat Tertutup</option>
                                <option value="penyalahgunaan_wewenang">Penyalahgunaan Wewenang (Pengelolaan Keuangan, BMN
dan Kepegawaian)</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="perencanaan">Perencanaan Program dan Anggaran</label>
                            <select name="perencanaan" id="perencanaan" class="form-control select">
                                <option value="" selected>pilih</option>
                                <option value="Pola & Rencana PSDA Belum di Reviu Sesuai Perkembangan Kebijakan Terbaru" >Pola & Rencana PSDA Belum di Reviu Sesuai Perkembangan Kebijakan Terbaru</option>
                                <option value="Implementasi Pembangunan Belum Mengacu Pada Pola dan Rencana PSDA">Implementasi Pembangunan Belum Mengacu Pada Pola dan Rencana PSDA</option>
                                <option value="Ketidaksiapan/Belum Ada Desain">Ketidaksiapan/Belum Ada Desain</option>
                                <option value="Pelaksanaan Pekerjaan Desain Melewati Tahun Anggaran<">Pelaksanaan Pekerjaan Desain Melewati Tahun Anggaran</option>
                                <option value="Kualitas Desain Rendah">Kualitas Desain Rendah</option>
                                <option value="Tenaga Ahli Tidak Sesuai Dengan Kontrak">Tenaga Ahli Tidak Sesuai Dengan Kontrak</option>
                                <option value="Nama dan Jumlah Tenaga Ahli Tidak Sesuai Kontrak">Nama dan Jumlah Tenaga Ahli Tidak Sesuai Kontrak</option>
                                <option value="Invoice Tidak Sesuai">Invoice Tidak Sesuai</option>
                                <option value="Tenaga Ahli Merangkap Lebih dari 3 Paket Pekerjaan">Tenaga Ahli Merangkap Lebih dari 3 Paket Pekerjaan</option>
                                <option value="Belum Terdapat PROM/Manual OP">Belum Terdapat PROM/Manual OP</option>
                                <option value="Desain Kadaluarsa/Tidak Terdapar Reviu Desain">Desain Kadaluarsa/Tidak Terdapar Reviu Desain"</option>
                                <option value="Program Tidak Tuntas Akibat Kurangnya Alokasi Anggaran">Program Tidak Tuntas Akibat Kurangnya Alokasi Anggaran</option>
                                <option value="Pembengkakan Biaya Akibat Tidak Terdapat Feasibility Study">Pembengkakan Biaya Akibat Tidak Terdapat Feasibility Study</option>
                                <option value="Dokumen Lingkungan Tidak Sesuai">Dokumen Lingkungan Tidak Sesuai</option>
                                <option value="Sempadan Sumber Air Belum Terdapat Kajian Penetapan">Sempadan Sumber Air Belum Terdapat Kajian Penetapan Sempadan</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pembebasan">Pembebasan Lahan</label>
                            <select name="pembebasan" id="pembebasan" class="form-control select">
                                <option value="" selected>pilih</option>
                                <option value="Penetapan Lokasi Belum Tuntas" selected>Penetapan Lokasi Belum Tuntas</option>
                                <option value="Sengketa Dengan Pemilik Lahan">Sengketa Dengan Pemilik Lahan</option>
                                <option value="Ketidaksiapan/Belum Ada Desain">Alih Status Lahan (Instansi Pemilik Lahan)</option>
                                <option value="Pelaksanaan Pekerjaan Desain Melewati Tahun Anggaran<">Ketidaksepakatan Harga Apraisal</option>
                                <option value="Kualitas Desain Rendah">Gugatan Hukum Ahli Waris</option>
                                <option value="Tenaga Ahli Tidak Sesuai Dengan Kontrak">Ketidaklengkapan Bukti Kepemilikan Tanah</option>
                                <option value="Nama dan Jumlah Tenaga Ahli Tidak Sesuai Kontrak">Pemalsuan Bukti Kepemilikan Tanah</option>
                                <option value="Invoice Tidak Sesuai">Duplikasi Kepemilikam Tanah</option>
                                <option value="Tenaga Ahli Merangkap Lebih dari 3 Paket Pekerjaan">Gugatan Warga Terkait Kepemilikan Lahan Kepada Instansi Pemerintah (ex : KLHK)</option>
                                <option value="Belum Terdapat PROM/Manual OP">Gugatan Yang Bersumber Dari Instansi Lain (ex : KLHK)</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tender">Tender</label>
                            <select name="tender" id="tender" class="form-control select">
                                <option value="" selected>pilih</option>
                                <option value="Mark Up HPS">Mark Up HPS</option>
                                <option value="Blacklist Penyedia Jasa">Blacklist Penyedia Jasa</option>
                                <option value="Ketidaksesuaian Kualifikasi Personil">Alih Status Lahan (Instansi Pemilik Lahan)</option>
                                <option value="Ketidaksesuaian Harga dan Kualifikasi Alat">Ketidaksesuaian Harga dan Kualifikasi Alat</option>
                                <option value="Ketidaksesuaian Harga dan Spesifikasi Bahan">Ketidaksesuaian Harga dan Spesifikasi Bahan</option>
                                <option value="Ketidaksesuaian Kualifikasi SBU">Ketidaksesuaian Kualifikasi SBU</option>
                                <option value="Duplikasi Tenaga Ahli">Duplikasi Tenaga Ahli</option>
                                <option value="Diarahkan Pada Penyedia Jasa/Barang Tertentu">Diarahkan Pada Penyedia Jasa/Barang Tertentu/option>
                                <option value="Harga Dasar Tidak Standar">Harga Dasar Tidak Standar</option>
                                <option value="Dokumen Lelang Tidak Standar">Dokumen Lelang Tidak Standar</option>
                                <option value="Dokumen Lelang Tidak Lengkap">Dokumen Lelang Tidak Lengkap</option>
                                <option value="Pengumuman Lelang Tidak Lengkap/Membingungkan">Pengumuman Lelang Tidak Lengkap/Membingungkan</option>
                                <option value="Sanggahan Tidak Ditanggapi">Sanggahan Tidak Ditanggapi</option>
                                <option value="Surat Penetapan Pemenang Ditunda Lama">Surat Penetapan Pemenang Ditunda Lama</option>
                                <option value="Pengumuman Lelang Singkat">Pengumuman Lelang Singkat</option>
                                <option value="Penandantanganan Kontrak Tidak Didukung Dengan Dokumen Asli">Penandantanganan Kontrak Tidak Didukung Dengan Dokumen Asli</option>
                                <option value="Penandatanganan Kontrak Dipersulit/Lama">Penandatanganan Kontrak Dipersulit/Lama</option>
                                
                            </select>
                        </div>

                        <div class="form-group col-lg-12 form-hide">
                            <label for="pelaksanaan">Pelaksanaan Konstruksi</label>
                            <select name="pelaksanaan" id="pelaksanaan" class="form-control select">
                                <option value="" selected>pilih</option>
                                <option value="Kualitas desain tidak sesuai Kondisi Lapangan">Kualitas desain tidak sesuai Kondisi Lapangan</option>
                                <option value="Tidak Melaksanakan K3">Tidak Melaksanakan K3</option>
                                <option value="Duplikasi Tenaga Ahli">Duplikasi Tenaga Ahli</option>
                                <option value="Kuantitas/Volume Tidak Sesuai Kontrak">Kuantitas/Volume Tidak Sesuai Kontrak</option>
                                <option value="Kualitas Tidak Sesuai Dengan Spesifikasi Teknis">Kualitas Tidak Sesuai Dengan Spesifikasi Teknis</option>
                                <option value="Harga Timpang">Harga Timpang</option>
                                <option value="Keterlambatan Pelaksanaan Pekerjaan">Keterlambatan Pelaksanaan Pekerjaan</option>
                                <option value="Kinerja Penyedia Jasa Rendah">Kinerja Penyedia Jasa Rendah</option>
                                <option value="Penipuan/Pemalsuan Kontrak">Penipuan/Pemalsuan Kontrak</option>
                                <option value="Putus Kontrak/Pekerjaan Tidak Selesai">Putus Kontrak/Pekerjaan Tidak Selesai</option>
                                <option value="Pengawasan PPK/Satker Lemah">Pengawasan PPK/Satker Lemah</option>
                                <option value="Pengawasan Konsultan Supervisi Lemah">Pengawasan Konsultan Supervisi Lemah</option>
                                <option value="Kerusakan Akibat Bencana Alam">Kerusakan Akibat Bencana Alam</option>
                                <option value="SSKK Tidak Mencakup Kegiatan di Lapangan">SSKK Tidak Mencakup Kegiatan di Lapangan</option>
                                <option value="Metode Pengukuran dan Pembayaran Item Pekerjaan Belum Jelas">Metode Pengukuran dan Pembayaran Item Pekerjaan Belum Jelas/option>
                                <option value="Spesifikasi Teknis Bersifat Normatif">Spesifikasi Teknis Bersifat Normatif</option>
                                <option value="Belum ada Justifikasi Teknis Pada Perubahan Pekerjaan">Belum ada Justifikasi Teknis Pada Perubahan Pekerjaan</option>
                                <option value="Ketidaksiapan Lahan">Ketidaksiapan Lahan</option>
                                <option value="Konsultan Supervisi Merangkap Lebih dari 1 Paket Pekerjaan">Konsultan Supervisi Merangkap Lebih dari 1 Paket Pekerjaan</option>
                                <option value="Permintaan Data dan Informasi Pelaksanaan Konstruksi">Permintaan Data dan Informasi Pelaksanaan Konstruksi</option>
                                <option value="Konsultan Supervisi Tidak Sesuai Dengan Dokumen Kontrak">Konsultan Supervisi Tidak Sesuai Dengan Dokumen Kontrak</option>
                                <option value="Sub Kontrak Pekerjaan Tidak Sesuai dengan Dokumen Kontrak">Sub Kontrak Pekerjaan Tidak Sesuai dengan Dokumen Kontrak</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pemanfaatan">Pemanfaatan</label>
                            <select name="pemanfaatan" id="pemanfaatan" class="form-control select">
                                <option value="" selected>pilih</option>
                                <option value="Pemanfaatan Sempadan Sumber Air Tanpa Rekomtek">Pemanfaatan Sempadan Sumber Air Tanpa Rekomtek</option>
                                <option value="Pemanfaatan BMN Tidak Berizin">Pemanfaatan BMN Tidak Berizin</option>
                                <option value="Kinerja Operasi Prasarana SDA Rendah">Kinerja Operasi Prasarana SDA Rendah</option>
                                <option value="Kinerja Pemeliharaan Prasarana SDA Rendah">Kinerja Pemeliharaan Prasarana SDA Rendah</option>
                                <option value="Lamanya Proses Rekomendasi Teknis dari UPT">Lamanya Proses Rekomendasi Teknis dari UPT</option>
                                <option value="Lamanya Proses Perizinan, Pemanfaatan & Penggunaan Sumber Air">Lamanya Proses Perizinan, Pemanfaatan & Penggunaan Sumber Air</option>
                                <option value="BMN Belum Bersertifikat">BMN Belum Bersertifikat</option>
                                <option value="Sempadan Sumber Air Belum Ditetapkan">Sempadan Sumber Air Belum Ditetapkan</option>
                                <option value="Pemanfaatan Sempadan Sumber Air Tidak Sesuai">Pemanfaatan Sempadan Sumber Air Tidak Sesuai</option>
                                <option value="RTRW Tidak Sesuai Peraturan Pemanfaatan Sempadan Sumber Air/BMN">RTRW Tidak Sesuai Peraturan Pemanfaatan Sempadan Sumber Air/BMN</option>
                                <option value="Perizinan Pemerintah Daerah Tidak Sesuai Dengan Peraturan Pemanfaatan Sempadan Sumber Air/BMN">Perizinan Pemerintah Daerah Tidak Sesuai Dengan Peraturan Pemanfaatan Sempadan Sumber Air/BMN</option>
                                <option value="Oknum Menguasai Sempadan Sumber Air/BMN">Oknum Menguasai Sempadan Sumber Air/BMN</option>
                                <option value="Outcome Tidak Termanfaatkan Secara Maksimal Karena Prasarana Pendukung Lain Belum Terbangun/Idle Capacity">Outcome Tidak Termanfaatkan Secara Maksimal Karena Prasarana Pendukung Lain Belum Terbangun/Idle Capacity</option>
                                <option value="RTTG Tidak Terintegrasi Dengan RAAT">RTTG Tidak Terintegrasi Dengan RAAT</option>
                                <option value="Pengelolaan BMN Kurang Baik">Pengelolaan BMN Kurang Baik</option>

                            </select>
                        </div>
                        
                        <div class="form-group col-sm-12 form-hide">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control select2">
                                <option value="0" selected>Belum Tindak Lanjut</option>
                                <option value="1">Proses</option>
                                <option value="2">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="keterangan">Keterangan*</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan"
                                placeholder="Masukkan keterangan">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pendampingan">Pendampingan*</label>
                            <input type="text" class="form-control" name="pendampingan" id="pendampingan"
                                placeholder="Masukkan pendampingan">
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