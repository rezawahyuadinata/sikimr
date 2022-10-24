<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Log;
use DB;
use Carbon\Carbon;

class GetPermohonanIzinCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-permohonan-izin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Permohonan Izin';

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
        Log::info('fetching data perizinan');
        $url = "https://perizinansda.pu.go.id/api/v1/authenticate";        
        $response = Http::post($url, [
            'username' => 'acwyrkzccmnl',
            'password' => 'wlHHbkEFBYWrbjAdxcEJ'
        ]);

        if(!$response->successful()) {
            Log::error("Terjadi Kesalahan Auth");
            return 0;
        }

        $token = json_decode(preg_replace('/[[:cntrl:]]/', '', $response->body()))->token;

        $url = "https://perizinansda.pu.go.id/api/v1-beta/daftar-permohonan-izin";        
        $response = Http::withToken($token)->get($url, [
            'username' => 'acwyrkzccmnl',
            'password' => 'wlHHbkEFBYWrbjAdxcEJ'
        ]);

        if(!$response->successful()) {
            Log::error("Terjadi Kesalahan Get Daftar Izin");
            return 0;
        }
        
        $data = json_decode(preg_replace('/[[:cntrl:]]/', '', $response->body()));
        Log::info("Saving Data");
        foreach ($data as $dt) {
            $perizinan = DB::table("tbl_api_permohonan_izin")
                ->where("nama_perusahaan", $dt->nama_perusahaan)
                ->where("sumber_air", $dt->sumber_air)
                ->where("nama_pemohon", $dt->nama_pemohon);
            if($perizinan->count() == 0) {
                $dt->tanggal_backup = date("Y-m-d H:i:s");
                DB::table("tbl_api_permohonan_izin")->insert((array) $dt);
            }
        }
        $perizinan = DB::table("tbl_api_permohonan_izin")
            ->whereNull('tanggal_surat_edit')
            ->update([
                'tanggal_surat_edit' =>  DB::raw("tanggal_surat")
            ]);
        return $data;
    }
}
