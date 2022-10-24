<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MapModel extends Model
{
    protected $table        = 'map';
    protected $primaryKey   = 'ID';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'ID',
        'Tempat',
        'Alamat',
        'LatLong',
    ];
}
