<?php

namespace App\Console\Commands;

use App\Model\Formulir\PaketPekerjaanModel;
use Illuminate\Console\Command;

use GuzzleHttp\Client;
use Illuminate\Support\Str;

class UpdateAPIPaketCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update-api-paket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengambil Data API Paket GISPUSAIR dan Menambahkan paket yang belum ada ke database';

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
        $headers = [
            'x-key' => 'vHUuNuslJsOZHGw5LWpHkJxR1Au2NGzI'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        //GetPaket
        $packet = $client->request('GET', 'https://gis.pusair-pu.go.id/api/v1/packet');
        $resultPacket = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $packet->getBody()), true);

        set_time_limit(0);
        $apis = $resultPacket;

        foreach ($apis as $api) {

            // Cek apakah data paket di API terdapat pada database
            $exist = PaketPekerjaanModel::where([
                'tahun' => '2022',
                'kdpaket' => $api['kdpaket']
            ])->first();

            //Store Paket Jika Belum ada di Database
            if (!$exist) {
                PaketPekerjaanModel::create([
                    'id' => Str::uuid(),
                    'tahun' => $api['tahun'],
                    'kdsatker' => $api['kdsatker'],
                    'kdprogram' => $api['kdprogram'],
                    'kdgiat' => $api['kdgiat'],
                    'kdoutput' => $api['kdoutput'],
                    'kdsoutput' => $api['kdsoutput'],
                    'kdkmpnen' => $api['kdkmpnen'],
                    'kdskmpnen' => $api['kdskmpnen'],
                    'kdpaket' => $api['kdpaket'],
                    'nmpaket' => $api['nmpaket'],
                    'vol' => $api['vol'],
                    'sat' => $api['sat'],
                    'kdlokasi' => $api['kdlokasi'],
                    'kdkabkota' => $api['kdkabkota'],
                    'pagu_51' => $api['pagu_51'],
                    'pagu_52' => $api['pagu_52'],
                    'pagu_53' => $api['pagu_53'],
                    'pagu_rpm' => $api['pagu_rpm'],
                    'pagu_sbsn' => $api['pagu_sbsn'],
                    'pagu_phln' => $api['pagu_phln'],
                    'pagu_total' => $api['pagu_total'],
                    'real_51' => $api['real_51'],
                    'real_52' => $api['real_52'],
                    'real_53' => $api['real_53'],
                    'real_rpm' => $api['real_rpm'],
                    'real_sbsn' => $api['real_sbsn'],
                    'real_phln' => $api['real_phln'],
                    'real_total' => $api['real_total'],
                    'progres_keuangan' => $api['progres_keuangan'],
                    'progres_fisik' => $api['progres_fisik'],
                    'progres_keu_jan' => $api['progres_keu_jan'],
                    'progres_keu_feb' => $api['progres_keu_feb'],
                    'progres_keu_mar' => $api['progres_keu_mar'],
                    'progres_keu_apr' => $api['progres_keu_apr'],
                    'progres_keu_mei' => $api['progres_keu_mei'],
                    'progres_keu_jun' => $api['progres_keu_jun'],
                    'progres_keu_jul' => $api['progres_keu_jul'],
                    'progres_keu_agu' => $api['progres_keu_agu'],
                    'progres_keu_sep' => $api['progres_keu_sep'],
                    'progres_keu_okt' => $api['progres_keu_okt'],
                    'progres_keu_nov' => $api['progres_keu_nov'],
                    'progres_keu_des' => $api['progres_keu_des'],
                    'progres_fisik_jan' => $api['progres_fisik_jan'],
                    'progres_fisik_feb' => $api['progres_fisik_feb'],
                    'progres_fisik_mar' => $api['progres_fisik_mar'],
                    'progres_fisik_apr' => $api['progres_fisik_apr'],
                    'progres_fisik_mei' => $api['progres_fisik_mei'],
                    'progres_fisik_jun' => $api['progres_fisik_jun'],
                    'progres_fisik_jul' => $api['progres_fisik_jul'],
                    'progres_fisik_agu' => $api['progres_fisik_agu'],
                    'progres_fisik_sep' => $api['progres_fisik_sep'],
                    'progres_fisik_okt' => $api['progres_fisik_okt'],
                    'progres_fisik_nov' => $api['progres_fisik_nov'],
                    'progres_fisik_des' => $api['progres_fisik_des'],
                    'ren_keu_jan' => $api['ren_keu_jan'],
                    'ren_keu_feb' => $api['ren_keu_feb'],
                    'ren_keu_mar' => $api['ren_keu_mar'],
                    'ren_keu_apr' => $api['ren_keu_apr'],
                    'ren_keu_mei' => $api['ren_keu_mei'],
                    'ren_keu_jun' => $api['ren_keu_jun'],
                    'ren_keu_jul' => $api['ren_keu_jul'],
                    'ren_keu_agu' => $api['ren_keu_agu'],
                    'ren_keu_sep' => $api['ren_keu_sep'],
                    'ren_keu_okt' => $api['ren_keu_okt'],
                    'ren_keu_nov' => $api['ren_keu_nov'],
                    'ren_keu_des' => $api['ren_keu_des'],
                    'ren_fis_jan' => $api['ren_fis_jan'],
                    'ren_fis_feb' => $api['ren_fis_feb'],
                    'ren_fis_mar' => $api['ren_fis_mar'],
                    'ren_fis_apr' => $api['ren_fis_apr'],
                    'ren_fis_mei' => $api['ren_fis_mei'],
                    'ren_fis_jun' => $api['ren_fis_jun'],
                    'ren_fis_jul' => $api['ren_fis_jul'],
                    'ren_fis_agu' => $api['ren_fis_agu'],
                    'ren_fis_sep' => $api['ren_fis_sep'],
                    'ren_fis_okt' => $api['ren_fis_okt'],
                    'ren_fis_nov' => $api['ren_fis_nov'],
                    'ren_fis_des' => $api['ren_fis_des']
                    // 'kdls' => $api['kdls'],
                    // 'rkn_nama' => $api['rkn_nama'],
                    // 'rkn_npwp' => $api['rkn_npwp'],
                    // 'nomor_kontrak' => $api['nomor_kontrak'],
                    // 'nilai_kontrak' => $api['nilai_kontrak'],
                    // 'tanggal_kontrak' => $api['tanggal_kontrak'],
                    // 'waktu_pelaksanaan' => $api['waktu_pelaksanaan'],
                    // 'tgl_spmk' => $api['tgl_spmk']
                ]);
            }
        }
    }
}
