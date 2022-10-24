<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Master\SatkerModel;

class TinjauanMRModel extends Model
{
    protected $table = 'tbl_tinjauan_mr';
    protected $primaryKey = 'tinjauan_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'tinjauan_id',
        'mr_id',
        'tinjauan_nomor',
        'tinjauan_tanggal',
        'dibuat_oleh',
        'dibuat_pada',
        'diubah_oleh',
        'diubah_pada',
        'level',
        'satker_id',
        'eselon1_id',
        'eselon2_id',
    ];

    public function komitmen_mr() {
        return $this->hasOne(KomitmenMRModel::class, 'mr_id', 'mr_id');
    }
}