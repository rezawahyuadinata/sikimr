<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class KotaModel extends Model
{
    protected $table = 'tbl_administrative_kabupaten';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'province_code',
        'kabupaten_code',
        'kabupaten_name',
        'insert_user', 'insert_date', 'update_user', 'update_date'
    ];

    public function scopegetDatatable() {
        return KotaModel::leftJoin('tbl_administrative_province', 'tbl_administrative_province.province_code', '=', 'tbl_administrative_kabupaten.province_code')
                            ->select('tbl_administrative_kabupaten.*', 'tbl_administrative_province.province_code', 'tbl_administrative_province.province_name');
    }
}
