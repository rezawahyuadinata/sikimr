<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Log;
use DB;
use Carbon\Carbon;

class GetPemilihanSipbjCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-pemilihan-sipbj';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Pemilihan SIPBJ';

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
        DB::table("tbl_sipbj_pemilihan")->truncate();
        $api = "http://sipbj.pu.go.id/".date('Y')."/rest_client/pemilihan";
        $data = json_decode(file_get_contents($api), true);
        $count = count($data['data']);
        for($i=0;$i<$count;$i++){
          DB::table('tbl_sipbj_pemilihan')->insert([
            'idrupp' => $data['data'][$i]['idrup'],
            'namapaket' => $data['data'][$i]['namapaket'],
            'id_satker' => $data['data'][$i]['id_satker'],
            'pelak_pml' => $data['data'][$i]['pelak_pml'],
            'monitoring' => $data['data'][$i]['monitoring'],
            'created_at' => NOW(),
            'updated_at' => NOW()
          ]);
      }
    }
}
