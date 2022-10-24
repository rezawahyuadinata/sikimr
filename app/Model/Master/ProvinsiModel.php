<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class ProvinsiModel extends Model
{
    protected $table = 'tbl_administrative_province';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'province_code',
        'province_name',
        'province_abbr',
        'insert_user', 'insert_date', 'update_user', 'update_date'
    ];

}
