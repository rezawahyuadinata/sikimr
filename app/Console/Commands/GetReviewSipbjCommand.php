<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Log;
use DB;
use Carbon\Carbon;

class GetReviewSipbjCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-review-sipbj';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Review SIPBJ';

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
      DB::table("tbl_sipbj_review")->truncate();

      $idrupp = DB::table('tbl_sipbj_perencanaan')->where('tahun_anggaran',date('Y'))->get();

      foreach($idrupp as $id){
        $api = "http://sipbj.pu.go.id/".date('Y')."/rest_client/review?kd_paket=".$id->idrupp;
        $data = json_decode(file_get_contents($api), true);

          DB::table('tbl_sipbj_review')->insert([
            'idrupp' => $data['data'][0]['idrup'],
            'namapaket' => $data['data'][0]['namapaket'],
            'id_satker' => $data['data'][0]['id_satker'],
            'usulan_pkt' => $data['data'][0]['usulan_pkt'],
            'pnt' => $data['data'][0]['pnt'],
            'spektek_pkj' => $data['data'][0]['spektek_pkj'],
            'rancangan_kontrak_pkj' => $data['data'][0]['rancangan_kontrak_pkj'],
            'hps_pkj' => $data['data'][0]['hps_pkj'],
            'created_at' => NOW(),
            'updated_at' => NOW()
          ]);
      }
    }
}
