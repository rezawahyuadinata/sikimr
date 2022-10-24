<?php

namespace App\Http\Controllers\Ki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

class Sheet2Controller extends MYController
{
    public function index() {
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('sheet2');
        foreach ($request['filters'] as $key => $value) {
            if($value) {
                $queryBuilder->where($key, 'like', "%$value%");
            }
        }

        return DataTables::queryBuilder($queryBuilder)
            ->toJson();

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }
}
