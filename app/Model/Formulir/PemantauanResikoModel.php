<?php

namespace App\Model\Formulir;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Master\SatkerModel;

class PemantauanResikoModel extends Model
{
    protected $table = 'tbl_pemantauan_resiko';
    protected $primaryKey = 'pemantauan_resiko_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'pemantauan_resiko_id',
        'mr_id',
        'pemantauan_resiko_nomor',
        'pemantauan_resiko_tanggal',
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