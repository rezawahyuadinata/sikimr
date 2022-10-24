<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class BalaiTeknisModel extends Model
{
    protected $table = 'm_balai_teknis';
    protected $primaryKey = 'id_balai_teknik';
    public $timestamps = false;

    protected $fillable = [
        'id_balai_teknik',
        'balai_teknik'
    ];

}
