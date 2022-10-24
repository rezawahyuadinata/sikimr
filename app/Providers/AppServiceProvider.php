<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Storage;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Model\Pengaturan\PenggunaAksesModel;
use App\Model\Pengaturan\PenggunaKategoriModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('*', function ($view) {
        //     if (! in_array($view->getName(), ['home', 'auth.login', 'layouts.app', 'welcome', 'auth.register', 'portal.layout.app'])) {
        //         if (Route::current()) {
        //             $uri = Route::current()->uri;
        //             $uri_explode = explode('/', $uri);
        //             $this->modul_nama = $uri_explode[0];

        //             $action = explode('.', Route::current()->action['as']);

        //             $this->class      = $action[0];
        //             $this->method      = isset($action[1]) ? $action[1] : 'index';

        //             $this->data = new \stdClass();

        //             $this->data->user = Auth::user();
        //             $this->data->user->pengguna_kategori_aktif = new \stdClass();
        //             $this->data->user->pengguna_kategori_aktif = PenggunaAksesModel::where('pengguna_id', Auth::id())->where('pengguna_akses_aktif', true)->first();
        //             $this->data->pengguna_kategori = PenggunaAksesModel::where('pengguna_id', Auth::id())->get();
        //             echo json_encode($this->data);
        //             die;
        //             $this->data->user->pengguna_kategori_aktif->akses = PenggunaKategoriModel::where('pengguna_kategori_id', $this->data->user->pengguna_kategori_aktif->pengguna_kategori_id)->first();
        //             $akses = json_decode($this->data->user->pengguna_kategori_aktif->akses->pengguna_kategori_akses);
        //             $modul = json_decode(Storage::disk('local')->get('modul.json'));

        //             $this->data->modul = new \stdClass();

        //             foreach ($modul as $key => $value) {
        //                 foreach ($akses as $keys => $values) {
        //                     if ($keys == $key) {
        //                         $this->data->modul->$key = $value;
        //                         break;
        //                     }
        //                 }
        //             }

        //             $this->data->menu = new \stdClass();
        //             if(! in_array($this->modul_nama, ['home'])) {
        //                 $modul_akses = $this->modul_nama;
        //                 $class = $this->class;
        //                 $method = $this->method;

        //                 $this->data->menu = json_decode(Storage::disk('local')->get($this->modul_nama . '.json'));
        //                 foreach ($this->data->menu as $key => $value) {
        //                     if (isset($akses->$modul_akses->$key)) {
        //                         foreach ($value->menu as $key_menu => $value_menu) {
        //                             if (isset($akses->$modul_akses->$key->$key_menu)) {
        //                                 foreach ($value_menu->fitur as $key_fitur => $value_fitur) {
        //                                     if (! isset($akses->$modul_akses->$key->$key_menu->$key_fitur)) {
        //                                         unset($this->data->menu->$key->menu->$key_menu->fitur->$key_fitur);
        //                                     }
        //                                 }
        //                             } else {
        //                                 unset($this->data->menu->$key->menu->$key_menu);
        //                             }
        //                         }
        //                     } else {
        //                         unset($this->data->menu->$key);
        //                     }
        //                 }

        //                 foreach ($this->data->menu as $key => $value) {
        //                     if (isset($value->menu->$class)) {
        //                         $page = $value->menu->$class;
        //                         $page->modul = $key;
        //                         $page->modul_nama = ucfirst($modul_akses);
        //                         $page->modul_folder = $value->folder;
        //                         $page->modul_aktif = $value->aktif;
        //                         $page->class = $class;
        //                         $page->class_nama = $value->menu->$class->nama;
        //                         $page->class_deskripsi = $value->menu->$class->deskripsi;
        //                         $page->class_validasi = $value->menu->$class->validasi;
        //                         $page->class_aktif = $value->menu->$class->aktif;
        //                         $page->method = $method;
        //                         $page->method_nama = $value->menu->$class->fitur->$method->nama;
        //                         $page->method_route = $value->menu->$class->fitur->$method->route;
        //                         $page->method_validasi = $value->menu->$class->fitur->$method->validasi;
        //                         $page->method_aktif = $value->menu->$class->fitur->$method->aktif;
        //                         $page->method_policy = $value->menu->$class->fitur->$method->policy;
        //                         $page->file_view     = $modul_akses . '.' . $page->class . '.' . str_replace('.', '-', $value->menu->$class->fitur->$method->route);
        //                         $page->file_js     = $modul_akses . '/' . $page->class . '/' . str_replace('.', '-', $value->menu->$class->fitur->$method->route);
        //                         $page->prefix = $modul_akses;
        //                         break;
        //                     }
        //                 }

        //                 $this->data->page = $page;
        //             }

        //             $view->with('auth', $this->data);
        //         }
        //     }
        // });
    }
}
