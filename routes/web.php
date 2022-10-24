<?php

use App\Model\Pengaturan\GalleryModel;
use App\Model\Pengaturan\BeritaModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//under construction
// Route::get('/', function () {
//     return view('Home.pages.index');
// });

//menu navbar
Route::get('/', 'Homev2Controller@index')->name('Welcome');
Route::get('/gallery', 'Homev2Controller@gallery')->name('Galeri');
Route::get('/news', 'Homev2Controller@berita')->name('Berita');
Route::get('/news/{slug}', 'Homev2Controller@beritadetail')->name('Berita-Terikini');
Route::get('/news/category/{slug}', 'Homev2Controller@beritacategory');
Route::get('/profil', 'Homev2Controller@profil')->name('Profil');
Route::get('/hukum', 'Homev2Controller@hukum')->name('Hukum');
Route::get('/sop', 'Homev2Controller@sop')->name('SOP');
Route::get('/tutorial', 'Homev2Controller@tutorial')->name('Tutorial');
//laporan carousel
Route::get('/laporanmr', 'Home2Controller@laporanmr')->name('LaporanMR');
Route::get('/laporanpbj', 'Homev2Controller@laporanpbj')->name('LaporanPBJ');
Route::get('/laporantender', 'Homev2Controller@aporantender')->name('LaporanTender');
Route::get('/laporanzi', 'Homev2Controller@laporanzi')->name('LaporanZI');
Route::get('/laporansiptl', 'Homev2Controller@laporansiptl')->name('LaporanSIPTL');

//Sending Notification
Route::get('/send-mail', 'Mailer\NotifEmailController@index');
Route::get('/lihat-format', function () {
    return view('email.notif_email');
});
// Route::get('email-test', function () {

// });
// Route::get('/testinghome', function () {

//     $data['galleries'] = GalleryModel::all();
//     $data['news'] = BeritaModel::all();

//     return view('Home.pages.home', $data);
// })->name('Welcome');
// Berita
// Route::get('/berita', 'Pengaturan\BeritaController@indexnews')->name('Berita.utama');
// Route::get('/berita/{slug}', 'Pengaturan\BeritaController@detailnews');
// Gallery
// Route::get('/gallery', 'Pengaturan\GalleryController@indexgallery')->name('Gallery.utama');
// Landasan Hukum
// Route::get('/policy','')->name('Hukum');
// Profile
// Route::get('/profile','')->name('Profile');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chart-progress-pekerjaan', 'HomeController@chartProgressPekerjaan')->name('chart_progress_pekerjaan');
Route::post('/logins', 'Auth\LoginController@authenticate')->name('logins');
// Route::get('/regiters', 'RegistersController@index')->name('registers');
Route::get('/regiters/update', 'RegistersController@store')->name('registers.store');
Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('home/tablePerijinan', 'HomeController@tablePerijinan')->name('home.tablePerijinan');
    Route::get('home/change-date', 'HomeController@changeDate')->name('home.changeDate');
    Route::post('home/tableRekapPengaduanBalai', 'HomeController@tableRekapPengaduanBalai')->name('home.tableRekapPengaduanBalai');

    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/profile/update_account', 'HomeController@update_account')->name('profile.update_account');
    Route::post('/profile/update_security', 'HomeController@update_security')->name('profile.update_security');

    Route::get('/detail', 'HomeController@detail')->name('detail');

    Route::get('/surat/download_pemantauan/{data_pemantauan}', 'DownLoadFileController@downloadfile_pemantauan')->name('dpemantauan');
    Route::get('/surat/download_telaahan/{data_telaahan}', 'DownLoadFileController@downloadfile_telaahan')->name('dtelaahan');

    Route::group(['prefix' => '/master'], function () {
        Route::get('/', 'Master\MasterController@index')->name('master.index');

        Route::post('provinsi/read', 'Master\ProvinsiController@read')->name('provinsi.read');
        Route::resource('provinsi', 'Master\ProvinsiController');
        Route::post('provinsi/update', 'Master\ProvinsiController@update')->name('provinsi.update');

        Route::post('kota/read', 'Master\KotaController@read')->name('kota.read');
        Route::resource('kota', 'Master\KotaController');
        Route::post('kota/update', 'Master\KotaController@update')->name('kota.update');

        Route::post('kecamatan/read', 'Master\KecamatanController@read')->name('kecamatan.read');
        Route::resource('kecamatan', 'Master\KecamatanController');
        Route::post('kecamatan/update', 'Master\KecamatanController@update')->name('kecamatan.update');
        Route::post('kecamatan/get_kota', 'Master\KotaController@get_kota')->name('kecamatan.get_kota');

        Route::post('kelurahan/read', 'Master\KelurahanController@read')->name('kelurahan.read');
        Route::resource('kelurahan', 'Master\KelurahanController');
        Route::post('kelurahan/update', 'Master\KelurahanController@update')->name('kelurahan.update');
        Route::post('kelurahan/get_kota', 'Master\KelurahanController@get_kota')->name('kelurahan.get_kota');
        Route::post('kelurahan/get_kecamatan', 'Master\KelurahanController@get_kecamatan')->name('kelurahan.get_kecamatan');
    });

    Route::group(['prefix' => '/ki'], function () {
        Route::get('pengadaan-barang/detail', 'Ki\PengadaanBarangController@detail')->name('pengadaan-barang.detail');
        Route::resource('pengadaan-barang', 'Ki\PengadaanBarangController');
        Route::post('pengadaan-barang/get_grafik', 'Ki\PengadaanBarangController@get_grafik')->name('pengadaan-barang.get_grafik');

        Route::post('sid/read', 'Ki\SIDController@read')->name('sid.read');
        Route::resource('sid', 'Ki\SIDController');
        Route::post('sid/update', 'Ki\SIDController@update')->name('sid.update');

        Route::post('pengadaan_tanah/read', 'Ki\PengadaanTanahController@read')->name('pengadaan_tanah.read');
        Route::resource('pengadaan_tanah', 'Ki\PengadaanTanahController');
        Route::post('pengadaan_tanah/update', 'Ki\PengadaanTanahController@update')->name('pengadaan_tanah.update');

        Route::post('op_kontraktual/read', 'Ki\OPKontraktualController@read')->name('op_kontraktual.read');
        Route::resource('op_kontraktual', 'Ki\OPKontraktualController');
        Route::post('op_kontraktual/update', 'Ki\OPKontraktualController@update')->name('op_kontraktual.update');

        Route::post('op_swakelola/read', 'Ki\OPSwakelolaController@read')->name('op_swakelola.read');
        Route::resource('op_swakelola', 'Ki\OPSwakelolaController');
        Route::post('op_swakelola/update', 'Ki\OPSwakelolaController@update')->name('op_swakelola.update');

        Route::post('tp_op/read', 'Ki\TPOPController@read')->name('tp_op.read');
        Route::resource('tp_op', 'Ki\TPOPController');
        Route::post('tp_op/update', 'Ki\TPOPController@update')->name('tp_op.update');

        Route::post('perizinan/read', 'Ki\PerizinanController@read')->name('perizinan.read');
        Route::resource('perizinan', 'Ki\PerizinanController');
        Route::post('perizinan/update', 'Ki\PerizinanController@update')->name('perizinan.update');
        Route::post('perizinan/job', 'Ki\PerizinanController@job')->name('perizinan.job');

        Route::post('perizinan-realisasi/read', 'Ki\PerizinanRealisasiController@read')->name('perizinan-realisasi.read');
        Route::resource('perizinan-realisasi', 'Ki\PerizinanRealisasiController');
        Route::post('perizinan-realisasi/update', 'Ki\PerizinanRealisasiController@update')->name('perizinan-realisasi.update');
        Route::post('perizinan-realisasi/rata', 'Ki\PerizinanRealisasiController@rata')->name('perizinan-realisasi.rata');

        Route::post('permohonan-izin/read', 'Ki\PermohonanIzinController@read')->name('permohonan-izin.read');
        Route::resource('permohonan-izin', 'Ki\PermohonanIzinController');
        Route::post('permohonan-izin/update', 'Ki\PermohonanIzinController@update')->name('permohonan-izin.update');
        Route::post('permohonan-izin/job', 'Ki\PermohonanIzinController@job')->name("permohonan-izin.job");

        Route::post('sheet2/read', 'Ki\Sheet2Controller@read')->name('sheet2.read');
        Route::resource('sheet2', 'Ki\Sheet2Controller');

        Route::post('profile/read', 'Ki\ProfileController@read')->name('profile.read');
        Route::resource('profile', 'Ki\ProfileController');
        Route::post('profile/job', 'Ki\ProfileController@job')->name('profile.job');

        Route::post('hps/read', 'Ki\HPSController@read')->name('hps.read');
        Route::resource('hps', 'Ki\HPSController');
        Route::post('hps/job', 'Ki\HPSController@job')->name('hps.job');

        Route::post('pemantauan_pbj/read', 'Ki\PemantauanPBJController@read')->name('pemantauan_pbj.read');
        Route::get('pemantauan_pbj/total', 'Ki\PemantauanPBJController@total')->name('pemantauan_pbj.total');
        Route::resource('pemantauan_pbj', 'Ki\PemantauanPBJController');
        Route::post('pemantauan_pbj/job', 'Ki\PemantauanPBJController@job')->name('pemantauan_pbj.job');

        Route::post('pemantauan_durasi_pbj/read', 'Ki\PemantauanDurasiPBJController@read')->name('pemantauan_durasi_pbj.read');
        Route::resource('pemantauan_durasi_pbj', 'Ki\PemantauanDurasiPBJController');
        Route::post('pemantauan_durasi_pbj/job', 'Ki\PemantauanDurasiPBJController@job')->name('pemantauan_durasi_pbj.job');

        Route::get('kemajuan/read', 'Ki\KemajuanController@read')->name('kemajuan.read');
        Route::resource('kemajuan', 'Ki\KemajuanController');
        Route::post('kemajuan/job', 'Ki\KemajuanController@job')->name('kemajuan.job');

        Route::post('persiapan_lelang/read', 'Ki\PersiapanLelangController@read')->name('persiapan_lelang.read');
        Route::resource('persiapan_lelang', 'Ki\PersiapanLelangController');

        // surat
        Route::post('surat/read', 'Ki\SuratController@read')->name('surat.read');
        Route::resource('surat', 'Ki\SuratController')->except(['update']);
        Route::get('surat/create_detail/{id}', 'Ki\SuratController@create_detail')->name('surat.create_detail');
        Route::post('surat/update', 'Ki\SuratController@update')->name('surat.update');
        Route::post('surat/store_detail', 'Ki\SuratController@store_detail')->name('surat.store_detail');
        Route::post('surat/update_detail', 'Ki\SuratController@update_detail')->name('surat.update_detail');
        Route::delete('surat/delete_data/{tipe}/{id}', 'Ki\SuratController@delete_data')->name('surat.delete_data');
        Route::post('surat/get_data', 'Ki\SuratController@get_data')->name('surat.get_data');
        Route::post('surat/get_satker', 'Ki\SuratController@get_satker')->name('surat.get_satker');
        Route::post('surat/get_ppk', 'Ki\SuratController@get_ppk')->name('surat.get_ppk');
        Route::get('surat/getsisatker/{id_eselon}', 'ControllerDiluarMyController@getsisatker')->name('getsisatker');
        Route::get('surat/getsippk/{id_satker}', 'ControllerDiluarMyController@getsippk')->name('getsippk');


        // pbj
        Route::post('pbj_unor/read', 'Ki\PbjUnorController@read')->name('pbj_unor.read');
        Route::resource('pbj_unor', 'Ki\PbjUnorController');
        Route::post('pbj_unor/update', 'Ki\PbjUnorController@update')->name('pbj_unor.update');

        Route::post('pbj_prov/read', 'Ki\PbjProvController@read')->name('pbj_prov.read');
        Route::resource('pbj_prov', 'Ki\PbjProvController');
        Route::post('pbj_prov/update', 'Ki\PbjProvController@update')->name('pbj_prov.update');

        Route::post('tujuan_ijin/read', 'Ki\TujuanIjinController@read')->name('tujuan_ijin.read');
        Route::resource('tujuan_ijin', 'Ki\TujuanIjinController');
        Route::post('tujuan_ijin/update', 'Ki\TujuanIjinController@update')->name('tujuan_ijin.update');

        Route::post('pemeriksaan_bpk/read', 'Ki\PemeriksaanBPKController@read')->name('pemeriksaan_bpk.read');
        Route::resource('pemeriksaan_bpk', 'Ki\PemeriksaanBPKController');
        Route::post('pemeriksaan_bpk/update', 'Ki\PemeriksaanBPKController@update')->name('pemeriksaan_bpk.update');

        Route::post('pemeriksaan_upt_bpk/read', 'Ki\PemeriksaanUptBPKController@read')->name('pemeriksaan_upt_bpk.read');
        Route::resource('pemeriksaan_upt_bpk', 'Ki\PemeriksaanUptBPKController');
        Route::post('pemeriksaan_upt_bpk/update', 'Ki\PemeriksaanUptBPKController@update')->name('pemeriksaan_upt_bpk.update');

        Route::post('pemantauan_bpk/read', 'Ki\PemantauanBPKController@read')->name('pemantauan_bpk.read');
        Route::resource('pemantauan_bpk', 'Ki\PemantauanBPKController');
        Route::post('pemantauan_bpk/update', 'Ki\PemantauanBPKController@update')->name('pemantauan_bpk.update');

        // Ajax
        Route::get('ajax/satker/{id}', 'Ajax\SatkerController@satker');
        Route::post('ajax/import-excel', 'Ajax\ImportController@importExcel');

        // Template
        Route::get('template/pemantauan_bpk/download', 'Ajax\ImportController@downloadTemplate');
    });

    Route::group(['prefix' => '/formulir'], function () {

        Route::get('/', 'Formulir\FormulirController@index')->name('formulir.index');
        Route::post('/read', 'Formulir\FormulirController@read')->name('formulir.read');
        Route::get('formulir/detail/{id}', 'Formulir\FormulirController@detail')->name('formulir.detail');
        Route::get('formulir/pemantauan/{id}', 'Formulir\FormulirController@pemantauan')->name('formulir.pemantauan');
        Route::delete('/formulir/delete_data/{id}', 'Formulir\FormulirController@destroy')->name('formulir.destroy');

        Route::resource('paket-pekerjaan', 'Formulir\PaketPekerjaanController');
        Route::post('paket-pekerjaan/read', 'Formulir\PaketPekerjaanController@read')->name('paket-pekerjaan.read');
        Route::post('paket-pekerjaan/update', 'Formulir\PaketPekerjaanController@update')->name('paket-pekerjaan.update');
        Route::get('paket-pekerjaan/create/{id}', 'Formulir\PaketPekerjaanController@create')->name('paket-pekerjaan.create');
        Route::delete('paket-pekerjaan/delete_data/{tipe}/{id}', 'Formulir\PaketPekerjaanController@delete_data')->name('paket-pekerjaan.delete_data');
        Route::post('paket-pekerjaan/get_data', 'Formulir\PaketPekerjaanController@get_data')->name('paket-pekerjaan.get_data');

        Route::resource('komitmen-mr', 'Formulir\KomitmenMRController');
        Route::post('komitmen-mr/read', 'Formulir\KomitmenMRController@read')->name('komitmen-mr.read');
        Route::post('komitmen-mr/update', 'Formulir\KomitmenMRController@update')->name('komitmen-mr.update');
        Route::get('komitmen-mr/create/{id}', 'Formulir\KomitmenMRController@create')->name('komitmen-mr.create');
        Route::delete('komitmen-mr/delete_data/{tipe}/{id}', 'Formulir\KomitmenMRController@delete_data')->name('komitmen-mr.delete_data');
        Route::post('komitmen-mr/get_data', 'Formulir\KomitmenMRController@get_data')->name('komitmen-mr.get_data');
        Route::post('komitmen-mr/detail/{id}', 'Formulir\KomitmenMRController@detail')->name('komitmen-mr.detail');

        Route::resource('pemantauan-mr', 'Formulir\PemantauanMRController');
        Route::post('pemantauan-mr/read', 'Formulir\PemantauanMRController@read')->name('pemantauan-mr.read');
        Route::post('pemantauan-mr/update', 'Formulir\PemantauanMRController@update')->name('pemantauan-mr.update');
        Route::get('pemantauan-mr/create/{id}', 'Formulir\PemantauanMRController@create')->name('pemantauan-mr.create');
        Route::delete('pemantauan-mr/delete_data/{tipe}/{id}', 'Formulir\PemantauanMRController@delete_data')->name('pemantauan-mr.delete_data');
        Route::post('pemantauan-mr/get_data', 'Formulir\PemantauanMRController@get_data')->name('pemantauan-mr.get_data');
        Route::post('pemantauan-mr/detail/{id}', 'Formulir\PemantauanMRController@detail')->name('pemantauan-mr.detail');

        Route::resource('tinjauan-mr', 'Formulir\TinjauanMRController');
        Route::post('tinjauan-mr/read', 'Formulir\TinjauanMRController@read')->name('tinjauan-mr.read');
        Route::post('tinjauan-mr/update', 'Formulir\TinjauanMRController@update')->name('tinjauan-mr.update');
        Route::get('tinjauan-mr/create/{id}', 'Formulir\TinjauanMRController@create')->name('tinjauan-mr.create');
        Route::delete('tinjauan-mr/delete_data/{tipe}/{id}', 'Formulir\TinjauanMRController@delete_data')->name('tinjauan-mr.delete_data');
        Route::post('tinjauan-mr/get_data', 'Formulir\TinjauanMRController@get_data')->name('tinjauan-mr.get_data');
        Route::post('tinjauan-mr/detail/{id}', 'Formulir\TinjauanMRController@detail')->name('tinjauan-mr.detail');

        Route::resource('pemantauan-resiko', 'Formulir\PemantauanResikoController');
        Route::post('pemantauan-resiko/read', 'Formulir\PemantauanResikoController@read')->name('pemantauan-resiko.read');
        Route::post('pemantauan-resiko/update', 'Formulir\PemantauanResikoController@update')->name('pemantauan-resiko.update');
        Route::get('pemantauan-resiko/create/{id}', 'Formulir\PemantauanResikoController@create')->name('pemantauan-resiko.create');
        Route::delete('pemantauan-resiko/delete_data/{tipe}/{id}', 'Formulir\PemantauanResikoController@delete_data')->name('pemantauan-resiko.delete_data');
        Route::post('pemantauan-resiko/get_data', 'Formulir\PemantauanResikoController@get_data')->name('pemantauan-resiko.get_data');
        Route::post('pemantauan-resiko/detail/{id}', 'Formulir\PemantauanResikoController@detail')->name('pemantauan-resiko.detail');

        Route::resource('verifikasi', 'Formulir\VerifikasiController');
        Route::get('verifikasi/detail/{id}', 'Formulir\VerifikasiController@detail')->name('verifikasi.detail');

        Route::resource('verifikasi-pemantauan', 'Formulir\VerifikasiPemantauanController');
        Route::get('verifikasi-pemantauan/detail/{id}', 'Formulir\VerifikasiPemantauanController@detail')->name('verifikasi-pemantauan.detail');
    });

    Route::group(['prefix' => '/pengaturan'], function () {

        Route::get('/', 'Pengaturan\PengaturanController@index')->name('pengaturan.index');

        Route::post('pengguna-kategori/read', 'Pengaturan\PenggunaKategoriController@read')->name('pengguna-kategori.read');
        Route::resource('pengguna-kategori', 'Pengaturan\PenggunaKategoriController');
        Route::post('pengguna-kategori/update', 'Pengaturan\PenggunaKategoriController@update')->name('pengguna-kategori.update');

        Route::post('pengguna/read', 'Pengaturan\PenggunaController@read')->name('pengguna.read');
        Route::resource('pengguna', 'Pengaturan\PenggunaController');
        Route::post('pengguna/update', 'Pengaturan\PenggunaController@update')->name('pengguna.update');
        Route::post('pengguna/store_kategori', 'Pengaturan\PenggunaController@store_kategori')->name('pengguna.store_kategori');
        Route::post('pengguna/activation_kategori', 'Pengaturan\PenggunaController@activation_kategori')->name('pengguna.activation_kategori');
        Route::delete('pengguna/destroy_kategori/{id}', 'Pengaturan\PenggunaController@destroy_kategori')->name('pengguna.destroy_kategori');

        Route::post('faq/read', 'Pengaturan\FaqController@read')->name('faq.read');
        Route::resource('faq', 'Pengaturan\FaqController');
        Route::post('faq/update', 'Pengaturan\FaqController@update')->name('faq.update');

        // Berita
        Route::resource('berita', 'Pengaturan\BeritaController');
        Route::post('berita/read', 'Pengaturan\BeritaController@read')->name('berita.read');
        Route::post('berita/update', 'Pengaturan\BeritaController@update')->name('berita.update');
        Route::post('berita/kategori', 'Pengaturan\BeritaCategoryController@storeCategory');
        Route::post('berita/kategori/read', 'Pengaturan\BeritaCategoryController@read');
        Route::post('berita/kategori/update', 'Pengaturan\BeritaCategoryController@update');
        Route::delete('berita/kategori/{id}', 'Pengaturan\BeritaCategoryController@destroy');

        //Galeri
        Route::resource('gallery', 'Pengaturan\GalleryController');
        Route::post('gallery/read', 'Pengaturan\GalleryController@read')->name('gallery.read');
        Route::post('gallery/update', 'Pengaturan\GalleryController@update')->name('gallery.update');

        //Hukum
        Route::resource('hukum', 'Pengaturan\HukumController');
        Route::post('hukum/read', 'Pengaturan\HukumController@read')->name('hukum.read');
        Route::post('hukum/update', 'Pengaturan\HukumController@update')->name('hukum.update');

        //Tutorial
        Route::resource('tutorial', 'Pengaturan\TutorController');
        Route::post('tutorial/read', 'Pengaturan\TutorController@read')->name('tutorial.read');
        Route::post('tutorial/update', 'Pengaturan\TutorController@update')->name('tutorial.update');

        //SOP
        Route::resource('sop', 'Pengaturan\SopController');
        Route::post('sop/read', 'Pengaturan\SopController@read')->name('sop.read');
        Route::post('sop/update', 'Pengaturan\SopController@update')->name('sop.update');
    });
});
