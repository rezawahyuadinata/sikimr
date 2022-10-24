<?php

namespace App\Http\Controllers\Ki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;
use Illuminate\Support\Facades\Http;

use DataTables;
use Validator;
use App\Model\Master\MapModel;
use App\Helpers\AppHelper;

//MODEL//

class PengadaanBarangController extends MYController
{
    public function index(Request $request)
    {
        $data = $this->data;
        $data->map = MapModel::select('*')->get();
        foreach ($data->map as $key => $value) {
            if ($value->LatLong) {
                $coor = explode(',', $value->LatLong);
                $value->lat = floatval($coor[0]);
                $value->long = floatval($coor[1]);
            }
        }

        return view($this->data->page->file_view, compact('data'));
    }

    public function detail(Request $request)
    {
        $this->data->status = $request->status;
        if ($request->status == 'Terkontrak') {
            $this->data->data = DB::table('sheet2')->select(DB::raw('count(*) as jumlah'), 'Jenis_Kontrak')->groupBy('Jenis_Kontrak')->whereNotNull('Tanggal_Realisasi_Kontrak')->get();

            $data = $this->data;
            return view($this->data->page->file_view, compact('data'));
        } else {
            return 'this features is underdevelopment';
        }
    }

    public function get_grafik(Request $request)
    {
        $this->result = new \stdClass();

        $this->result->series = array(
            array(
                'name' => 'Terkontrak',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Persiapan Terkontrak',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Proses Lelang',
                'periode' => array(),
                'data'  => array()
            ),
            array(
                'name' => 'Belum Lelang',
                'periode' => array(),
                'data'  => array()
            )
        );

        $date = strtotime(date('Y-m-d') . ' -1 year');
        $oneyear = date('Y-m-d', $date);

        $start    = new \DateTime($oneyear);
        $start->modify('first day of this month');
        $end      = new \DateTime(date('Y-m-d'));
        $end->modify('first day of next month');
        $interval = \DateInterval::createFromDateString('1 month');
        $period   = new \DatePeriod($start, $interval, $end);

        $this->result->categories = array();
        foreach ($period as $dt) {
            $terkontrak = DB::table('sheet2')->select(DB::raw('count(*) as jumlah'))->where('Bulan_Tahun_Sync', $dt->format('Y-m'))->whereNotNull('Tanggal_Realisasi_Kontrak')->first();
            $persiapan = DB::table('sheet2')->select(DB::raw('count(*) as jumlah'))->where('Bulan_Tahun_Sync', $dt->format('Y-m'))->whereNull('Tanggal_Realisasi_Kontrak')->whereNotNull('Tanggal_Rencana_Kontrak')->first();
            $proses = DB::table('sheet2')->select(DB::raw('count(*) as jumlah'))->where('Bulan_Tahun_Sync', $dt->format('Y-m'))->whereNull('Tanggal_Penetapan_Pemenang')->whereNotNull('Tanggal_Pengumuman_Lelang')->first();
            $belum = DB::table('sheet2')->select(DB::raw('count(*) as jumlah'))->where('Bulan_Tahun_Sync', $dt->format('Y-m'))->whereNull('Tanggal_Pengumuman_Lelang')->first();

            array_push($this->result->categories, AppHelper::getMonthIndo($dt->format('m')) . ' - ' . $dt->format('Y'));

            array_push($this->result->series[0]['data'], ($terkontrak ? floatval($terkontrak->jumlah) : 0));
            array_push($this->result->series[0]['periode'], $dt->format('Y-m'));
            array_push($this->result->series[1]['data'], ($persiapan ? floatval($persiapan->jumlah) : 0));
            array_push($this->result->series[1]['periode'], $dt->format('Y-m'));
            array_push($this->result->series[2]['data'], ($proses ? floatval($proses->jumlah) : 0));
            array_push($this->result->series[2]['periode'], $dt->format('Y-m'));
            array_push($this->result->series[3]['data'], ($belum ? floatval($belum->jumlah) : 0));
            array_push($this->result->series[3]['periode'], $dt->format('Y-m'));
        }

        return json_encode($this->result);
    }
}
