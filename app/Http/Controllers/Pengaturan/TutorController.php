<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MYController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

class TutorController extends MYController
{
    public function index()
    {
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request)
    {
        $queryBuilder = DB::table('tbl_tutors')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }
}
