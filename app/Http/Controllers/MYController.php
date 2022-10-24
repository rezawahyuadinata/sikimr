<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Route;
use Auth;
use App\User;
use DB;

use App\Model\Pengaturan\PenggunaKategoriModel;
use App\Model\Pengaturan\PenggunaAksesModel;
use App\Model\Pengaturan\FaqModel;
use App\Model\Master\SatkerModel;
use App\Model\Master\Eselon3Model;
use App\Model\Master\Eselon2Model;
use App\Model\Master\Eselon1Model;
use App\Model\Master\PpkModel;

class MYController extends Controller
{
    public $data;
    public $modul_nama;
    public $user;

    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->data->user = Auth::user();

            $this->data->faq = FaqModel::get();

            $this->data->user->pengguna_kategori = PenggunaKategoriModel::where('pengguna_kategori_id', $this->data->user->pengguna_kategori_id)->first();

            if ($this->data->user->level == 'PPK') {
                $this->data->user->satker = SatkerModel::findOrfail($this->data->user->satker_id);
                $this->data->user->pemilik_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pemilik_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pengelola_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pengelola_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->kode = str_pad($this->data->user->satker->KODE, 6, 0, STR_PAD_LEFT);
            } else if ($this->data->user->level == 'UPR-T3') {
                $this->data->user->satker = SatkerModel::findOrfail($this->data->user->satker_id);
                $this->data->user->pemilik_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pemilik_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola_resiko = $this->data->user->satker->KEPALA;
                $this->data->user->pengelola_resiko_jabatan = 'Kepala ' . $this->data->user->satker->NAMA;
                $this->data->user->pengelola_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->kode = str_pad($this->data->user->satker->KODE, 6, 0, STR_PAD_LEFT);
            } elseif ($this->data->user->level == 'UPR-T2') {
                $this->data->user->satker = Eselon2Model::where('ID', $this->data->user->eselon2_id)->where('UPR2', 'Pemilik Risiko')->first();
                $this->data->user->pemilik_resiko = $this->data->user->satker->PEJABAT;
                $this->data->user->pemilik_resiko_jabatan = $this->data->user->satker->JABATAN;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola = Eselon3Model::where('ES2_ID', $this->data->user->eselon2_id)->where('UPR2', 'Pengelola Risiko')->first();
                $this->data->user->pengelola_resiko = $this->data->user->pengelola->PEJABAT;;
                $this->data->user->pengelola_resiko_jabatan = $this->data->user->pengelola->JABATAN;;
                $this->data->user->pengelola_resiko_nip = $this->data->user->pengelola->NIP;;
                $this->data->user->kode = str_pad($this->data->user->satker->DIPA, 6, 0, STR_PAD_LEFT);
            } else if ($this->data->user->level == 'UPR-T1') {
                $this->data->user->satker = Eselon1Model::where('ID', $this->data->user->eselon1_id)->first();
                $this->data->user->pemilik_resiko = $this->data->user->satker->PEJABAT;
                $this->data->user->pemilik_resiko_jabatan = $this->data->user->satker->JABATAN;
                $this->data->user->pemilik_resiko_nip = $this->data->user->satker->NIP;
                $this->data->user->pengelola = Eselon2Model::where('ES1_ID', $this->data->user->eselon1_id)->where('UPR1', 'Pengelola Risiko')->first();
                $this->data->user->pengelola_resiko = $this->data->user->pengelola ? $this->data->user->pengelola->PEJABAT : '';
                $this->data->user->pengelola_resiko_jabatan = $this->data->user->pengelola ? $this->data->user->pengelola->JABATAN : '';
                $this->data->user->pengelola_resiko_nip = $this->data->user->pengelola ? $this->data->user->pengelola->NIP : '';
                $this->data->user->kode = $this->data->user->pengelola ? str_pad($this->data->user->pengelola->DIPA, 6, 0, STR_PAD_LEFT) : '';
                if ($this->data->user->pengelola) {
                    $this->data->user->pengelola2 = Eselon2Model::where('ES1_ID', $this->data->user->eselon1_id)->where('UPR1', 'Pengelola Risiko')->where('ID', '!=', $this->data->user->pengelola->ID)->first();
                    $this->data->user->pengelola2_resiko = $this->data->user->pengelola2->PEJABAT;;
                    $this->data->user->pengelola2_resiko_jabatan = $this->data->user->pengelola2->JABATAN;;
                    $this->data->user->pengelola2_resiko_nip = $this->data->user->pengelola2->NIP;;
                    $this->data->user->kode = str_pad($this->data->user->pengelola2->DIPA, 6, 0, STR_PAD_LEFT);
                } else {
                    $this->data->user->pengelola2 = '';
                    $this->data->user->pengelola2_resiko = '';
                    $this->data->user->pengelola2_resiko_jabatan = '';
                    $this->data->user->pengelola2_resiko_nip = '';
                    $this->data->user->kode = '';
                }
            }

            $akses = json_decode($this->data->user->pengguna_kategori->pengguna_kategori_akses);
            $modul = json_decode(Storage::disk('local')->get('modul.json'));

            $this->data->modul = new \stdClass();

            foreach ($modul as $key => $value) {
                foreach ($akses as $keys => $values) {
                    if ($keys == $key) {
                        $this->data->modul->$key = $value;
                        break;
                    }
                }
            }

            $this->data->menu = new \stdClass();

            $class = $this->class;
            $method = $this->method;
            foreach ($this->data->modul as $modules => $values) {
                $modul_akses = $modules;

                if (!in_array($modules, ['home', 'profile', '', 'detail'])) {
                    $values->menu = json_decode(Storage::disk('local')->get($modules . '.json'));
                    foreach ($values->menu as $key => $value) {
                        if (isset($akses->$modul_akses->$key)) {
                            foreach ($value->menu as $key_menu => $value_menu) {
                                if (isset($akses->$modul_akses->$key->$key_menu)) {
                                    foreach ($value_menu->fitur as $key_fitur => $value_fitur) {
                                        if (!isset($akses->$modul_akses->$key->$key_menu->$key_fitur)) {
                                            if ($values->menu->$key->menu->$key_menu->fitur->$key_fitur->validasi == true) {
                                                unset($value->menu->$key_menu->fitur->$key_fitur);
                                            }
                                        }
                                    }
                                } else {
                                    unset($value->menu->$key_menu);
                                }
                            }
                        } else {
                            unset($value->$key);
                        }
                    }
                }
            }

            if (!in_array($this->modul_nama, ['home', 'profile', '', 'detail'])) {
                foreach ($this->data->modul as $keys => $values) {
                    foreach ($values->menu as $key => $value) {
                        if (isset($value->menu->$class)) {
                            $page = $value->menu->$class;
                            $page->modul = $key;
                            $page->modul_nama = ucfirst($keys);
                            $page->modul_folder = $value->folder;
                            $page->modul_aktif = $value->aktif;
                            $page->class = $class;
                            $page->class_nama = $value->menu->$class->nama;
                            $page->class_deskripsi = $value->menu->$class->deskripsi;
                            $page->class_validasi = $value->menu->$class->validasi;
                            $page->class_aktif = $value->menu->$class->aktif;
                            $page->method = $method;
                            $page->method_nama = $value->menu->$class->fitur->$method->nama;
                            $page->method_route = $value->menu->$class->fitur->$method->route;
                            $page->method_validasi = $value->menu->$class->fitur->$method->validasi;
                            $page->method_aktif = $value->menu->$class->fitur->$method->aktif;
                            $page->method_policy = $value->menu->$class->fitur->$method->policy;
                            $page->file_view     = $keys . '.' . $page->class . '.' . str_replace('.', '-', $value->menu->$class->fitur->$method->route);
                            $page->file_js     = $keys . '/' . $page->class . '/' . str_replace('.', '-', $value->menu->$class->fitur->$method->route);
                            $page->prefix = $keys;
                            break;
                        }
                    }
                }

                $this->data->page = $page;
            } else {
                $page = new \stdClass();
                $page->nama = 'Home';
                $page->modul = 'home';
                $page->class = 'home';
                $page->modul_folder = '';
                $page->class_nama = 'Home';
                $page->class_deskripsi = '';
                $page->prefix = 'home';

                $this->data->page = $page;
            }

            return $next($request);
        });

        $this->data = new \stdClass();
        if (isset(Route::current()->uri)) {
            $uri = Route::current()->uri;
            $uri_explode = explode('/', $uri);

            $action = explode('.', Route::current()->action['as']);

            $this->modul_nama = $uri_explode[0];
            $this->class      = $action[0];
            $this->method      = isset($action[1]) ? $action[1] : 'index';
        }

        $this->_get_user();
        $this->_get_pengguna_kategori_aktif();
        $this->_get_pengguna_kategori();
        $this->_get_page();
    }

    private function _get_user()
    {
        $this->data->user = $this->user;
    }

    public function _get_pengguna_kategori_aktif()
    {
        $this->data->user = new \stdClass();
        $this->data->user->pengguna_kategori_aktif = new \stdClass();
    }

    public function _get_pengguna_kategori()
    {
        $this->data->user = new \stdClass();
        $this->data->user->pengguna_kategori = new \stdClass();
    }

    private function _get_modul()
    {
        $this->data->modul = null;
    }

    private function _get_menu()
    {
        $this->data->menu = null;
    }

    private function _get_page()
    {
        $this->data->page = null;
    }
}
