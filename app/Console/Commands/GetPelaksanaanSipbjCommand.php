<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Log;
use DB;
use Carbon\Carbon;

class GetPelaksanaanSipbjCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-pelaksanaan-sipbj';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Pelaksanaan SIPBJ';

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
        DB::table("tbl_sipbj_pelaksanaan")->truncate();
        $api = "http://sipbj.pu.go.id/".date('Y')."/rest_client/pelaksanaan";
        $data = json_decode(file_get_contents($api), true);
        $count = count($data['data']);
        for($i=0;$i<$count;$i++){
          DB::table('tbl_sipbj_pelaksanaan')->insert([
            'idrupp' => $data['data'][$i]['idrup'],
            'namapaket' => $data['data'][$i]['namapaket'],
            'id_satker' => $data['data'][$i]['id_satker'],
            'kntrk_pkt' => $data['data'][$i]['kntrk_pkt'],
            'sppbj_pkt' => $data['data'][$i]['sppbj_pkt'],
            'sdpp_pkt' => $data['data'][$i]['sdpp_pkt'],
            'kso_pkt' => $data['data'][$i]['kso_pkt'],
            'subkon_pkt' => $data['data'][$i]['subkon_pkt'],
            'kmp_perso' => $data['data'][$i]['kmp_perso'],
            'perso' => $data['data'][$i]['perso'],
            'spmk' => $data['data'][$i]['spmk'],
            'addendum' => $data['data'][$i]['addendum'],
            'srh_terima' => $data['data'][$i]['srh_terima'],
            'peralatan' => $data['data'][$i]['peralatan'],
            'created_at' => NOW(),
            'updated_at' => NOW()
          ]);
      }
    }
}
