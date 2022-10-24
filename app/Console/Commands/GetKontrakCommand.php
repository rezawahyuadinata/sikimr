<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Log;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;    
use GuzzleHttp\Client;  

class GetKontrakCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-kontrak';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Kontrak API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Tahun ini
        Log::info('fetching data Kontrak Now');
        $response = Http::get('https://emonitoring.pu.go.id/api_ditkisda/kontrak', ['thang' => now()->format("Y")]);
        // $url = "https://emonitoring.pu.go.id/api_ditkisda/kontrak";
        // $response = Http::get($url, [
        //     'token' => md5('ditkisda'.date('Ymd')),
        //     'thang' => now()->format("Y")
        // ]);

        if(!$response->successful()) {
            Log::error("Terjadi Kesalahan");
            return 0;
        }

        $data = json_decode(preg_replace('/[[:cntrl:]]/', '', $response->body()));

        // Tahun Kemarin
        Log::info("Saving Data Kontrak Then");
        foreach ($data as $dt) {
            $kontrak = DB::table("tbl_api_kontrak")
                ->where("kdpaket", $dt->kdpaket)
                ->where("tgl_backup", $dt->tgl_backup)
                ->where("tahun", $dt->tahun);
                // ->where("kdrup", $dt->kdrup);
            if($kontrak->count() == 0) {
                $dt->persentase = $dt->hps == 0 ? 0 : (round(((floatval($dt->nilai_kontrak ?: 0) / floatval($dt->hps ?: 1) ) * 100), 2));
                $dt->nilai_kontrak = round(floatval($dt->nilai_kontrak ?: 0),2);
                $dt->hps = round(floatval($dt->hps ?: 0),2);
                $dt->pg = $dt->pg ?: 0;
                $dt->tanggal_backup = date("Y-m-d H:i:s");
                $dt->tgl_rencana_lelang = Carbon::parse($dt->tgl_rencana_lelang)->format("Y-m-d");
                $dt->jadwal_pengumuman = Carbon::parse($dt->jadwal_pengumuman)->format("Y-m-d");
                $dt->jadwal_pemenang = Carbon::parse($dt->jadwal_pemenang)->format("Y-m-d");
                $dt->jadwal_kontrak = Carbon::parse($dt->jadwal_kontrak)->format("Y-m-d");
                $dt->jadwal_tgl_kontrak = Carbon::parse($dt->jadwal_tgl_kontrak)->format("Y-m-d");
                $dt->tanggal_kontrak = Carbon::parse($dt->tanggal_kontrak)->format("Y-m-d");
                $dt->tgl_spmk = Carbon::parse($dt->tgl_spmk)->format("Y-m-d");
                $dt->durasi_lelang_hari = Carbon::parse($dt->jadwal_pengumuman)->diffInDays(Carbon::parse($dt->tanggal_kontrak), false);
                DB::table("tbl_api_kontrak")->insert((array) $dt);
            }
        }
        //Update
        $updateKd = DB::table("tbl_api_kontrak")->whereNull("kduker")->update([
            'kduker' => DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(kdpaket, '.', 4), '.', -1)")
        ]);
        $updateDana = DB::table("tbl_api_kontrak")->whereNull('sumber_dana_total')->update([
            'sumber_dana_total' => DB::raw("IF(IFNULL(rmp, '') = '', 0, rmp) + IF(IFNULL(phln, '') = '', 0, phln) + IF(IFNULL(sbsn, '') = '', 0, sbsn)")
        ]);

        Log::info('fetching data Kontrak');
        $response = Http::get('https://emonitoring.pu.go.id/api_ditkisda/kontrak', ['thang' => now()->subYears(1)->format('Y')]);

        if(!$response->successful()) {
            Log::error("Terjadi Kesalahan");
            return 0;
        }

        $data = json_decode(preg_replace('/[[:cntrl:]]/', '', $response->body()));

        Log::info("Saving Data Kontrak");
        foreach ($data as $dt) {
            $kontrak = DB::table("tbl_api_kontrak")
                ->where("kdpaket", $dt->kdpaket)
                ->where("tgl_backup", $dt->tgl_backup)
                ->where("tahun", $dt->tahun);
                // ->where("kdrup", $dt->kdrup);
            if($kontrak->count() == 0) {
                $dt->persentase = $dt->hps == 0 ? 0 : (round(((floatval($dt->nilai_kontrak ?: 0) / floatval($dt->hps ?: 1) ) * 100), 2));
                $dt->nilai_kontrak = round(floatval($dt->nilai_kontrak ?: 0),2);
                $dt->hps = round(floatval($dt->hps ?: 0),2);
                $dt->pg = $dt->pg ?: 0;
                $dt->tanggal_backup = date("Y-m-d H:i:s");
                $dt->tgl_rencana_lelang = Carbon::parse($dt->tgl_rencana_lelang)->format("Y-m-d");
                $dt->jadwal_pengumuman = Carbon::parse($dt->jadwal_pengumuman)->format("Y-m-d");
                $dt->jadwal_pemenang = Carbon::parse($dt->jadwal_pemenang)->format("Y-m-d");
                $dt->jadwal_kontrak = Carbon::parse($dt->jadwal_kontrak)->format("Y-m-d");
                $dt->jadwal_tgl_kontrak = Carbon::parse($dt->jadwal_tgl_kontrak)->format("Y-m-d");
                $dt->tanggal_kontrak = Carbon::parse($dt->tanggal_kontrak)->format("Y-m-d");
                $dt->tgl_spmk = Carbon::parse($dt->tgl_spmk)->format("Y-m-d");
                $dt->durasi_lelang_hari = Carbon::parse($dt->jadwal_pengumuman)->diffInDays(Carbon::parse($dt->tanggal_kontrak), false);
                DB::table("tbl_api_kontrak")->insert((array) $dt);
            }
        }
        //Update
        $updateKd = DB::table("tbl_api_kontrak")->whereNull("kduker")->update([
            'kduker' => DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(kdpaket, '.', 4), '.', -1)")
        ]);
        $updateDana = DB::table("tbl_api_kontrak")->whereNull('sumber_dana_total')->update([
            'sumber_dana_total' => DB::raw("IF(IFNULL(rmp, '') = '', 0, rmp) + IF(IFNULL(phln, '') = '', 0, phln) + IF(IFNULL(sbsn, '') = '', 0, sbsn)")
        ]);


        return $data;
    }
}
