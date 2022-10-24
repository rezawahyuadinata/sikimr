<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use DB;
use Log;


class GetProfileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Profile From Server';

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
        Log::info('fetching data');
        $thang = [now()->subYears(1)->format('Y'), now()->format("Y")];
        foreach ($thang as $th) {
            $url = "https://emonitoring.pu.go.id/api_ditkisda/profil";
            $response = Http::get($url, [
                'token' => md5('ditkisda' . date('Ymd')),
                'thang' => $th
            ]);

            if (!$response->successful()) {
                Log::error("Terjadi Kesalahan");
                return 0;
            }

            $data = json_decode(preg_replace('/[[:cntrl:]]/', '', $response->body()));

            Log::info("Saving Data");
            foreach ($data as $dt) {
                $cek_profile = DB::table("tbl_api_profiles")
                    ->where("tanggal_backup", $dt->tanggal_backup)
                    ->where('thang', $th)
                    ->where("nmsatker", $dt->nmsatker);
                if ($cek_profile->count() > 0) {
                    continue;
                }

                $dt->tglkirim = empty($dt->tglkirim) ? null : $dt->tglkirim;
                $dt->paguspan = empty($dt->paguspan) ? null : $dt->paguspan;
                $dt->real_keu = empty($dt->real_keu) ? null : $dt->real_keu;
                $dt->real_fisik = empty($dt->real_fisik) ? null : $dt->real_fisik;
                $dt->rencana_keuangan = empty($dt->rencana_keuangan) ? null : $dt->rencana_keuangan;
                $dt->rencana_fisik = empty($dt->rencana_fisik) ? null : $dt->rencana_fisik;
                $dt->deviasi = 0;
                $dt->deviasi_fisik = 0;
                $dt->thang = $th;
                DB::table("tbl_api_profiles")->insert((array) $dt);
                DB::table("tbl_api_profiles")
                    ->where("deviasi", 0)
                    ->orWhere("deviasi_fisik", 0)
                    ->orWhereNull("deviasi_fisik")
                    ->update([
                        'deviasi' => DB::raw("real_keu - rencana_keuangan"),
                        'deviasi_fisik' => DB::raw("real_fisik - rencana_fisik")
                    ]);
            }
            // return $data;
        }
    }
}
