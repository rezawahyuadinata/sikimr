<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MYController;
use Illuminate\Http\Request;
use App\Model\Pengaturan\HukumModel;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

class HukumController extends MYController
{
    public function index()
    {
        $data = $this->data;

        // dd($data);
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request)
    {
        $queryBuilder = DB::table('tbl_hukums')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file_hukum' => 'required|max:10000|mimes:pdf',
            'name_hukum' => 'required',
            'category' => 'required',
        ])->setAttributeNames([
            'file_hukum' => 'File Hukum',
            'name_hukum' => 'Nama Hukum',
            'category' => 'Kategori',
        ]);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }

        if ($request->file('file_hukum')) {
            $filenameWithExt = $request->file('file_hukum')->getClientOriginalName();
            $filename = $request->category;
            $extension = $request->file('file_hukum')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('file_hukum')->storeAs('public/uploads/hukum', $filenameSimpan);
        }

        DB::beginTransaction();

        $data = new HukumModel();

        // $data->fill($request->all());
        $data->name = $request->name_hukum;
        $data->file_category = $request->category;
        $data->file_name = $filenameSimpan;

        $data->save();

        DB::commit();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }
}
