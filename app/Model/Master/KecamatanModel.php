<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    protected $table = 'tbl_administrative_kecamatan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'kabupaten_code',
        'kecamatan_code',
        'kecamatan_name',
        'insert_user', 'insert_date', 'update_user', 'update_date'
    ];

    public function scopegetDatatable() {
        return KecamatanModel::leftJoin('tbl_administrative_kabupaten', 'tbl_administrative_kabupaten.kabupaten_code', '=', 'tbl_administrative_kecamatan.kabupaten_code')
                            ->leftJoin('tbl_administrative_province', 'tbl_administrative_province.province_code', '=', 'tbl_administrative_kabupaten.province_code')
                            ->select('tbl_administrative_kecamatan.*', 'tbl_administrative_kabupaten.kabupaten_code', 'tbl_administrative_kabupaten.kabupaten_name', 'tbl_administrative_province.province_code', 'tbl_administrative_province.province_code', 'tbl_administrative_province.province_name');
    }
}
