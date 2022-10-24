<?php

namespace App\Http\Controllers\Ki;

use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use App\Model\Master\Eselon1Model;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use Str;
use Storage;
use Image;

use DataTables;
use Validator;

//MODEL//
use Response;
use App\Model\Master\SuratModel;
use App\Model\Master\PengaduanModel;
use App\Model\Master\PengaduanKategoriModel;
use App\Model\Master\PembahasanModel;
use App\Model\Master\PeninjauanLapanganModel;
use App\Model\Master\TelaahanModel;
use App\Model\Master\PemantauanModel;
use App\Model\Master\Eselon2Model;
use App\Model\Master\SatkerModel;
use App\Model\Master\PpkModel;
use Carbon\Carbon;


class SuratController extends MYController
{
    public function index()
    {
        $data = $this->data;
        

        //updatewaktusurat
        $datsa = SuratModel::all();
        foreach($datsa as $dat)
        {
            $hariini = Carbon::now()->format('Y-m-d H:i:s');

            if(Carbon::parse($dat->tanggal_md)->lt(Carbon::now()))
            {
                $tanggalMD = Carbon::parse($dat->tanggal_md);
                $diffMD = $tanggalMD->diffInDays($hariini);
                $diffMD2 = "Kozong";
                $statusmd = "Telat " . ($diffMD+1) . " Hari";
                $quer = [
                    'waktu'=>$statusmd
                ];
                SuratModel::where('id',$dat->id)->update($quer);
            }else{
                $tanggalMD = Carbon::parse($dat->tanggal_md);
                $diffMD = $tanggalMD->diffInDays($hariini);
                $diffMD2 = $diffMD;
            }

            if(Carbon::parse($dat->tanggal_tl)->lt(Carbon::now()))
            {
                $tanggalTL = Carbon::parse($dat->tanggal_TL);
                $diffTL = $tanggalTL->diffInDays($hariini);
                $diffTL2 = "Kozong";
                $statustl = "Telat " . ($diffTL+1) . " Hari";
                $quer = [
                    'waktu'=>$statustl
                ];
                SuratModel::where('id',$dat->id)->update($quer);
            }else{
                $tanggalTL = Carbon::parse($dat->tanggal_tl);
                $diffTL = $tanggalTL->diffInDays($hariini);    
                $diffTL2 = $diffTL;
            }

            if ($diffMD2 != "Kozong")
            {
                if($diffMD2 <= 5)
                {
                    $tanggalMD = Carbon::parse($dat->tanggal_md);
                    $diffMD = $tanggalMD->diffInDays($hariini);
                    $statusmd = "Sisa " . ($diffMD+1) . " Hari Lagi";
                    $quer = [
                        'waktu'=>$statusmd
                    ];
                    SuratModel::where('id',$dat->id)->update($quer);
                }

                if ($diffMD2 == 0)
                {
                    $statusmd = "Waktu telah Habis";
                    $quer = [
                        'waktu'=>$statusmd
                    ];
                    SuratModel::where('id',$dat->id)->update($quer);
                }
            
                if ($diffMD2 > 5)
                {
                    $tanggalMD = Carbon::parse($dat->tanggal_md);
                    $diffMD = $tanggalMD->diffInDays($hariini);
                    $statusmd = ($diffMD+1) . " Hari";
                    $quer = [
                        'waktu'=>$statusmd
                    ];
                    SuratModel::where('id',$dat->id)->update($quer);
                }
            }

            if($diffTL2 != "Kozong")
            {
                if ($diffTL2 <= 5)
                {
                    $tanggalTL = Carbon::parse($dat->tanggal_tl);
                    $diffTL = $tanggalTL->diffInDays($hariini);
                    $statustl = "Sisa " . ($diffTL+1) . " Hari Lagi";
                    $quer = [
                        'status_tl_nota_dinas'=>$statustl,
                    ];
                    SuratModel::where('id',$dat->id)->update($quer);
                }
                
                if (Carbon::parse($dat->tanggal_tl)->lt(Carbon::now()))
                {
                    
                }
    
                if ($diffTL2 == 0 )
                {
                    $statustl = "Waktu telah Habis";
                    $quer = [
                        'status_tl_nota_dinas'=>$statustl,
                    ];
                    SuratModel::where('id',$dat->id)->update($quer);
                }
                
                if ($diffTL2 > 5)
                {
                    $tanggalTL = Carbon::parse($dat->tanggal_tl);
                    $diffTL = $tanggalTL->diffInDays($hariini);
                    $statustl = ($diffTL+1) . " Hari";
                    $quer = [
                        'status_tl_nota_dinas'=>$statustl,
                    ];
                    SuratModel::where('id',$dat->id)->update($quer);
                };
            }               
        }
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request)
    {
        $queryBuilder = SuratModel::select('*')
            ->where('deleted_at', NULL);

        $data = $queryBuilder->get();
        return DataTables::of($data)->make(true);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'tgl_terima'        => 'required',
            'no_surat'          => 'required',
            'tgl_surat'         => 'required',
            'perihal'           => 'required',
            'kata_kunci'        => 'required',
        ])->setAttributeNames([
            'tgl_terima'        => 'Tanggal Terima',
            'no_surat'          => 'No Surat',
            'tgl_surat'         => 'Tanggal Surat',
            'perihal'           => 'Perihal',
            'kata_kunci'        => 'Kata Kunci',
        ]);

        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        try {
            $data = new SuratModel;

            $data->fill($request->all());

            $data->dibuat_oleh  = Auth::user()->id;
            $data->dibuat_pada  = date('Y-m-d H:i:s');

            $data->save();

            DB::commit();

            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan.',
            );
        } catch (\Throwable $th) {
            $response = array(
                'status'    => false,
                'message'   => $th
            );
        }

        return json_encode($response);
    }

    public function update(Request $request)
    {
        $data = SuratModel::findOrfail($request->id);

        $validate = Validator::make($request->all(), [
            'tgl_terima'        => 'required',
            'no_surat'          => 'required',
            'tgl_surat'         => 'required',
            'perihal'           => 'required',
            'kata_kunci'        => 'required',
        ])->setAttributeNames([
            'tgl_terima'        => 'Tanggal Terima',
            'no_surat'          => 'No Surat',
            'tgl_surat'         => 'Tanggal Surat',
            'perihal'           => 'Perihal',
            'kata_kunci'        => 'Kata Kunci',
        ]);

        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        try {
            $data = SuratModel::findOrfail($request->id);

            $data->fill($request->all());

            $data->diubah_oleh  = Auth::user()->id;
            $data->diubah_pada  = date('Y-m-d H:i:s');

            $data->save();

            DB::commit();

            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil diubah.',
                'id'        => $request->id
            );
        } catch (\Throwable $th) {
            $response = array(
                'status'    => false,
                'message'   => $th
            );
        }

        return json_encode($response);
    }

    public function destroy($id)
    {
        try {
            $data = SuratModel::findOrfail($id);

            $data->deleted_at = date('Y-m-d H:i:s');

            $data->save();

            $response = array(
                'status'    => true,
                'message'   => 'Data berhasil dihapus.'
            );
        } catch (\Throwable $th) {
            $response = array(
                'status'    => false,
                'message'   => $th
            );
        }

        return json_encode($response);
    }

    public function create_detail($id)
    {
        $this->data->surat = SuratModel::findOrfail($id);
        $this->data->eselon2 = Eselon2Model::orderBy('NAMA',  'ASC')->get();
        $this->data->satker = SatkerModel::orderBy('NAMA',  'ASC')->get();
        $this->data->ppk = PpkModel::orderBy('NAMA',  'ASC')->get();
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function store_detail(Request $request)
    {
        if ($request->tipe == 'pengaduan') {
            $this->_store_pengaduan($request);
        } else if ($request->tipe == 'pengaduan_kategori') {
            $this->_store_pengaduan_kategori($request);
        } else if ($request->tipe == 'pembahasan') {
            $this->_store_pembahasan($request);
        } else if ($request->tipe == 'peninjauan_lapangan') {
            $this->_store_peninjauan_lapangan($request);
        } else if ($request->tipe == 'telaahan') {
            $this->_store_telaahan($request);
        } else if ($request->tipe == 'pemantauan') {
            $this->_store_pemantauan($request);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    private function _store_pengaduan($request)
    {
        $nama_satker = DB::table('satker')->select('NAMA')->where('KODE',$request->pemilik_resiko_satker)->pluck('NAMA')->first();
        $nama_bws = DB::table('eselon-2')->select('NAMA')->where('ID',$request->pemilik_resiko_bws)->pluck('NAMA')->first();
        $data = new PengaduanModel;
        $data->fill($request->except('pemilik_resiko_satker'));
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->pemilik_resiko_satker = $nama_satker;
        $data->pemilik_resiko_bws = $nama_bws;
        $data->save();

        $nama_bws = DB::table('eselon-2')->select('NAMA')->where('ID',$request->pemilik_resiko_bws)->pluck('NAMA')->first();
        $query = [
            'balai' => $nama_bws
        ];
        SuratModel::where('id',$data->id_surat)->update($query);

    }

    private function _store_pengaduan_kategori($request)
    {

        $data = new PengaduanKategoriModel;
        $data->fill($request->all());
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _store_pembahasan($request)
    {
        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('/media/pembahasan/dokumentasi');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
        }

        if ($files_memo = $request->file('file_memo')) {

            $filename_memo = uniqid() . '.' . $files_memo->getClientOriginalExtension();

            $path_memo = public_path('/media/pembahasan/file_memo');
            if (!File::exists($path_memo)) {
                File::makeDirectory($path_memo, $mode = 0777, true, true);
            }
            $files_memo->move($path_memo, $filename_memo);
        }
        $data = new PembahasanModel;
        $data->fill($request->all());
        if (isset($filename)) {
            $data->dokumentasi = $filename;
        }
        if (isset($filename_memo)) {
            $data->file_memo = $filename_memo;
        }
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();



        //insert into tbl_surat (Prosses & Waktu)
        $hariini = Carbon::now()->format('Y-m-d H:i:s');

        $waktuMDdateTime = Carbon::parse($request->batas_waktu_peninjauan);
        $diffMD = $waktuMDdateTime->diffInDays($hariini);
        $statusMD = ($diffMD+1) . " Hari";
        
        $waktuTLdateTimeadd = (new Carbon($request->tanggal))->addDays(14);
        $waktuTLdateTime = Carbon::parse($waktuTLdateTimeadd);
        $diffTL = $waktuTLdateTime->diffInDays($hariini);
        $statusTL = ($diffTL+1) . " Hari";

        
        $valTL = "14 Hari";
        $qry = [
            'prosses'=>$request->proses,
            'tanggal_md'=>$waktuMDdateTime,
            'tanggal_tl'=>$waktuTLdateTime,
            'waktu'=>$statusMD,
            'status_tl_nota_dinas'=>'14 Hari'
        ];
        SuratModel::where('id',$data->id_surat)->update($qry);
    }

    private function _store_peninjauan_lapangan($request)
    {
        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('/media/peninjauan_lapangan/foto_laporan');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
        }

        if ($files_laporan = $request->file('file_laporan')) {

            $filename_laporan = uniqid() . '.' . $files_laporan->getClientOriginalExtension();

            $path_laporan = public_path('/media/peninjauan_lapangan/file_laporan');
            if (!File::exists($path_laporan)) {
                File::makeDirectory($path_laporan, $mode = 0777, true, true);
            }
            $files_laporan->move($path_laporan, $filename_laporan);
        }
        $data = new PeninjauanLapanganModel;
        $data->fill($request->all());
        if (isset($filename)) {
            $data->foto_laporan = $filename;
        }
        if (isset($filename_laporan)) {
            $data->file_laporan = $filename_laporan;
        }
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _store_telaahan($request)
    {
        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('/media/telaahan/foto_telaahan');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
        }

        if ($files_telaahan = $request->file('file_telaahan')) {

            $filename_telaahan = uniqid() . '.' . $files_telaahan->getClientOriginalExtension();

            $path_telaahan = public_path('/media/telaahan/file_telaahan');
            if (!File::exists($path_telaahan)) {
                File::makeDirectory($path_telaahan, $mode = 0777, true, true);
            }
            $files_telaahan->move($path_telaahan, $filename_telaahan);
        }
        $data = new TelaahanModel;
        $data->fill($request->all());
        if (isset($filename)) {
            $data->foto_telaahan = $filename;
        }
        if (isset($filename_telaahan)) {
            $data->file_telaahan = $filename_telaahan;
        }
        $data->dibuat_oleh  = Auth::user()->id;
        // $data->dibuat_pada->addDays(14)  = date('Y-m-d H:i:s');
        $data->dibuat_pada = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();


        $query = 
        [
            'tanggal_md' => $request->batas_waktu_pemantauan,
            'tanggal_tl' => Carbon::parse($request->tanggal)->addDays(14)
        ];

        SuratModel::where('id',$request->id_surat)->update($query);

        return back();
    }

    private function _store_pemantauan($request)
    {
        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('/media/pemantauan/foto_pemantauan');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
        }

        if ($files_pemantauan = $request->file('file_pemantauan')) {

            $filename_pemantauan = uniqid() . '.' . $files_pemantauan->getClientOriginalExtension();

            $path_pemantauan = public_path('/media/pemantauan/file_pemantauan');
            if (!File::exists($path_pemantauan)) {
                File::makeDirectory($path_pemantauan, $mode = 0777, true, true);
            }
            $files_pemantauan->move($path_pemantauan, $filename_pemantauan);
        }
        $data = new PemantauanModel;
        $data->fill($request->all());
        if (isset($filename)) {
            $data->foto_pemantauan = $filename;
        }
        if (isset($filename_pemantauan)) {
            $data->file_pemantauan = $filename_pemantauan;
        }
        $data->dibuat_oleh  = Auth::user()->id;
        $data->dibuat_pada  = date('Y-m-d H:i:s');
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function get_data(Request $request)
    {
        if ($request->tipe == 'pengaduan') {
            $data = $this->_get_pengaduan($request);
        } else if ($request->tipe == 'pengaduan_kategori') {
            $data = $this->_get_pengaduan_kategori($request);
        } else if ($request->tipe == 'pembahasan') {
            $data = $this->_get_pembahasan($request);
        } else if ($request->tipe == 'peninjauan_lapangan') {
            $data = $this->_get_peninjauan_lapangan($request);
        } else if ($request->tipe == 'telaahan') {
            $data = $this->_get_telaahan($request);
        } else if ($request->tipe == 'pemantauan') {
            $data = $this->_get_pemantauan($request);
        }
        return $data;
    }

    public function _get_pengaduan($request)
    {
        $queryBuilder = PengaduanModel::leftJoin('eselon-2', 'eselon-2.ID', '=', 'tbl_pengaduan.pemilik_resiko_bws')
            ->leftJoin('satker', 'satker.ID', '=', 'tbl_pengaduan.pemilik_resiko_satker')
            ->leftJoin('ppk', 'ppk.ID', '=', 'tbl_pengaduan.pemilik_resiko_ppk')
            ->select('tbl_pengaduan.*', 'eselon-2.NAMA as eselon_nama', 'satker.NAMA as satker_nama', 'ppk.NAMA as ppk_nama')
            ->where('deleted_at', NULL);

        if ($request->id_surat) {
            $queryBuilder->where('id_surat', $request->id_surat);
        }

        $data = $queryBuilder->get();
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($data)->make(true);
    }

    public function _get_pengaduan_kategori($request)
    {
        $queryBuilder = PengaduanKategoriModel::select('*')
            ->where('deleted_at', NULL);

        if ($request->id_surat) {
            $queryBuilder->where('id_surat', $request->id_surat);
        }

        $data = $queryBuilder->get();
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($data)->make(true);
    }

    public function _get_pembahasan($request)
    {
        $queryBuilder = PembahasanModel::select('*')
            ->where('deleted_at', NULL);

        if ($request->id_surat) {
            $queryBuilder->where('id_surat', $request->id_surat);
        }

        $data = $queryBuilder->get();
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($data)->make(true);
    }

    public function _get_peninjauan_lapangan($request)
    {
        $queryBuilder = PeninjauanLapanganModel::select('*')
            ->where('deleted_at', NULL);

        if ($request->id_surat) {
            $queryBuilder->where('id_surat', $request->id_surat);
        }

        $data = $queryBuilder->get();
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($data)->make(true);
    }

    public function _get_telaahan($request)
    {
        $queryBuilder = TelaahanModel::select('*')
            ->where('deleted_at', NULL);

        if ($request->id_surat) {
            $queryBuilder->where('id_surat', $request->id_surat);
        }

        $data = $queryBuilder->get();
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($data)->make(true);
    }

    public function _get_pemantauan($request)
    {
        $queryBuilder = PemantauanModel::select('*')
            ->where('deleted_at', NULL);

        if ($request->id_surat) {
            $queryBuilder->where('id_surat', $request->id_surat);
        }

        $data = $queryBuilder->get();
        // return DataTables::queryBuilder($queryBuilder)->toJson();
        return DataTables::of($data)->make(true);
    }

    public function update_detail(Request $request)
    {
        if ($request->tipe == 'pengaduan') {
            $this->_update_pengaduan($request);
        } else if ($request->tipe == 'pengaduan_kategori') {
            $this->_update_pengaduan_kategori($request);
        } else if ($request->tipe == 'pembahasan') {
            $this->_update_pembahasan($request);
        } else if ($request->tipe == 'peninjauan_lapangan') {
            $this->_update_peninjauan_lapangan($request);
        } else if ($request->tipe == 'telaahan') {
            $this->_update_telaahan($request);
        } else if ($request->tipe == 'pemantauan') {
            $this->_update_pemantauan($request);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    private function _update_pengaduan($request)
    {
        
        $data = PengaduanModel::findOrfail($request->id);
        $nama_satker = DB::table('satker')->select('NAMA')->where('KODE',$request->pemilik_resiko_satker)->pluck('NAMA')->first();
        $data->fill($request->except('pemilik_resiko_satker'));
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->pemilik_resiko_satker = $nama_satker;
        $data->save();
    }

    private function _update_pengaduan_kategori($request)
    {
        $data = PengaduanKategoriModel::findOrfail($request->id);
        $data->fill($request->all());
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_pembahasan($request)
    {
        $data_exist = PembahasanModel::findOrfail($request->id);
        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('/media/pembahasan/dokumentasi');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
            $file_exist = $path . '/' . $data_exist->dokumentasi;
            if (File::exists($file_exist)) {
                @unlink($file_exist);
            }
        }

        if ($files_memo = $request->file('file_memo')) {
            $filename_memo = uniqid() . '.' . $files_memo->getClientOriginalExtension();
            $path_memo = public_path('/media/pembahasan/file_memo');
            if (!File::exists($path_memo)) {
                File::makeDirectory($path_memo, $mode = 0777, true, true);
            }
            $files_memo->move($path_memo, $filename_memo);
            $file_exist_memo = $path_memo . '/' . $data_exist->file_memo;
            if (File::exists($file_exist_memo)) {
                @unlink($file_exist_memo);
            }
        }

        $data = PembahasanModel::findOrfail($request->id);
        $data->fill($request->all());
        if (isset($filename)) {
            $data->dokumentasi = $filename;
        }
        if (isset($filename_memo)) {
            $data->file_memo = $filename_memo;
        }
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();

        //update into tbl_surat (Prosses & Waktu)
        $adays = (new Carbon($request->tanggal))->addDays(14);
        $valTL = "14 Hari";
        $qry = [
            'prosses'=>$request->proses,
            'waktu'=>$adays,
            'status_tl_nota_dinas'=>$valTL
        ];
        SuratModel::where('id',$data->id_surat)->update($qry);
    }

    private function _update_peninjauan_lapangan($request)
    {
        $data_exist = PeninjauanLapanganModel::findOrfail($request->id);

        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('/media/peninjauan_lapangan/foto_laporan');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
            $file_exist = $path . '/' . $data_exist->foto_laporan;
            if (File::exists($file_exist)) {
                @unlink($file_exist);
            }
        }

        if ($files_laporan = $request->file('file_laporan')) {
            $filename_laporan = uniqid() . '.' . $files_laporan->getClientOriginalExtension();
            $path_laporan = public_path('/media/peninjauan_lapangan/file_laporan');
            if (!File::exists($path_laporan)) {
                File::makeDirectory($path_laporan, $mode = 0777, true, true);
            }
            $files_laporan->move($path_laporan, $filename_laporan);
            $file_exist_laporan = $path_laporan . '/' . $data_exist->file_laporan;
            if (File::exists($file_exist_laporan)) {
                @unlink($file_exist_laporan);
            }
        }
        $data = PeninjauanLapanganModel::findOrfail($request->id);
        $data->fill($request->all());
        if (isset($filename)) {
            $data->foto_laporan = $filename;
        }
        if (isset($filename_laporan)) {
            $data->file_laporan = $filename_laporan;
        }
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_telaahan($request)
    {
        $data_exist = TelaahanModel::findOrfail($request->id);
        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('/media/telaahan/foto_telaahan');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
            $file_exist = $path . '/' . $data_exist->foto_telaahan;
            if (File::exists($file_exist)) {
                @unlink($file_exist);
            }
        }

        if ($files_telaahan = $request->file('file_telaahan')) {

            $filename_telaahan = uniqid() . '.' . $files_telaahan->getClientOriginalExtension();

            $path_telaahan = public_path('/media/telaahan/file_telaahan');
            if (!File::exists($path_telaahan)) {
                File::makeDirectory($path_telaahan, $mode = 0777, true, true);
            }
            $files_telaahan->move($path_telaahan, $filename_telaahan);
            $file_exist_telaahan = $path_telaahan . '/' . $data_exist->file_telaahan;
            if (File::exists($file_exist_telaahan)) {
                @unlink($file_exist_telaahan);
            }
        }
        $data = TelaahanModel::findOrfail($request->id);
        $data->fill($request->all());
        if (isset($filename)) {
            $data->foto_telaahan = $filename;
        }
        if (isset($filename_telaahan)) {
            $data->file_telaahan = $filename_telaahan;
        }
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    private function _update_pemantauan($request)
    {
        $data_exist = PemantauanModel::findOrfail($request->id);
        if ($files = $request->file('image')) {
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $path = public_path('app/public/media/pemantauan/foto_pemantauan');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $files->move($path, $filename);
            $file_exist = $path . '/' . $data_exist->foto_pemantauan;
            if (File::exists($file_exist)) {
                @unlink($file_exist);
            }
        }

        if ($files_pemantauan = $request->file('file_pemantauan')) {

            $filename_pemantauan = uniqid() . '.' . $files_pemantauan->getClientOriginalExtension();

            $path_pemantauan = public_path('app/public/media/pemantauan/file_pemantauan');
            if (!File::exists($path_pemantauan)) {
                File::makeDirectory($path_pemantauan, $mode = 0777, true, true);
            }
            $files_pemantauan->move($path_pemantauan, $filename_pemantauan);
            $file_exist_pemantauan = $path_pemantauan . '/' . $data_exist->file_pemantauan;
            if (File::exists($file_exist_pemantauan)) {
                @unlink($file_exist_pemantauan);
            }
        }
        $data = PemantauanModel::findOrfail($request->id);
        $data->fill($request->all());
        if (isset($filename)) {
            $data->foto_pemantauan = $filename;
        }
        if (isset($filename_pemantauan)) {
            $data->file_pemantauan = $filename_pemantauan;
        }
        $data->diubah_oleh  = Auth::user()->id;
        $data->diubah_pada  = date('Y-m-d H:i:s');
        $data->save();
    }

    public function delete_data($tipe, $id)
    {
        if ($tipe == 'pengaduan') {
            $this->_delete_pengaduan($id);
        } else if ($tipe == 'pengaduan_kategori') {
            $this->_delete_pengaduan_kategori($id);
        } else if ($tipe == 'pembahasan') {
            $this->_delete_pembahasan($id);
        } else if ($tipe == 'peninjauan_lapangan') {
            $this->_delete_peninjauan_lapangan($id);
        } else if ($tipe == 'telaahan') {
            $this->_delete_telaahan($id);
        } else if ($tipe == 'pemantauan') {
            $this->_delete_pemantauan($id);
        }

        $response = array(
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }

    private function _delete_pengaduan($id)
    {
        $data = PengaduanModel::findOrfail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();
        return true;
    }

    private function _delete_pengaduan_kategori($id)
    {
        $data = PengaduanKategoriModel::findOrfail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();
        return true;
    }

    private function _delete_pembahasan($id)
    {
        $data = PembahasanModel::findOrfail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();
        return true;
    }

    private function _delete_peninjauan_lapangan($id)
    {
        $data = PeninjauanLapanganModel::findOrfail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();
        return true;
    }

    private function _delete_telaahan($id)
    {
        $data = TelaahanModel::findOrfail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();
        return true;
    }

    private function _delete_pemantauan($id)
    {
        $data = PemantauanModel::findOrfail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();
        return true;
    }

    public function get_satker(Request $request)
    {
        $data = SatkerModel::where('ES2_ID', $request->bws)->get();

        $response = array(
            'status'    => true,
            'message'   => '',
            'data'      => $data
        );

        return json_encode($response);
    }

    public function get_ppk(Request $request)
    {
        $data = PpkModel::where('SATKER_ID', $request->satker)->get();

        $response = array(
            'status'    => true,
            'message'   => '',
            'data'      => $data
        );

        return json_encode($response);
    }




}
