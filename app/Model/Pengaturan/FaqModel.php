<?php

namespace App\Model\Pengaturan;

use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    protected $table = 'tbl_faq';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'question',
        'answer',
        'createdAt', 'updatedAt', 'deletedAt'
    ];

}
