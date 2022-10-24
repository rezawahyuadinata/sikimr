<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Log;
use DB;
use Carbon\Carbon;

class GetPerencanaanSipbjCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-perencanaan-sipbj';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Perencanaan SIPBJ';

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
      DB::table("tbl_sipbj_perencanaan")->truncate();
      $api = "http://sipbj.pu.go.id/".date('Y')."/rest_client/perencanaan";
      $data = json_decode(file_get_contents($api), true);
      $count = count($data['data']);
      for($i=0;$i<$count;$i++){
        DB::table('tbl_sipbj_perencanaan')->insert([
          'idrupp' => $data['data'][$i]['idrup'],
          'namapaket' => $data['data'][$i]['namapaket'],
          'id_satker' => $data['data'][$i]['id_satker'],
          'jumlah_pagu' => $data['data'][$i]['jumlah_pagu'],
          'lokasi' => $data['data'][$i]['lokasi'],
          'stk_kode' => $data['data'][$i]['stk_kode'],
          'tahun_anggaran' => $data['data'][$i]['tahun_anggaran'],
          'pkt_ppk' => $data['data'][$i]['pkt_ppk'],
          'kak_kpa' => $data['data'][$i]['kak_kpa'],
          'idk_kpa' => $data['data'][$i]['idk_kpa'],
          'rab_kpa' => $data['data'][$i]['rab_kpa'],
          'jd_kpa' => $data['data'][$i]['jd_kpa'],
          'spt_kpa' => $data['data'][$i]['spt_kpa'],
          'created_at' => NOW(),
          'updated_at' => NOW()
        ]);
    }
    }
}
