<?php

namespace App\Model\Pengaturan;

use Illuminate\Database\Eloquent\Model;

class ActiveYearModel extends Model
{
    protected $table = 'tbl_active_year';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'active_year',
        'insert_user', 'insert_date', 'update_user', 'update_date'
    ];

}
