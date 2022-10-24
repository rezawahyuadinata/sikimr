<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MYController;
use App\Model\Pengaturan\SopCategoryModel;
use App\Model\Pengaturan\SopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

class SopController extends MYController
{
    public function index()
    {
        $this->data->sopCat = SopCategoryModel::all();
        $data = $this->data;

        // dd($data);
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request)
    {
        $queryBuilder = DB::table('tbl_sops')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file_sop' => 'required|max:50000|mimes:pdf',
            'name' => 'required',
            'category' => 'required',
        ])->setAttributeNames([
            'file_sop' => 'File SOP',
            'name' => 'Nama SOP',
            'category' => 'Kategori',
            'status' => 'Status SOP',
        ]);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }

        if ($request->file('file_sop')) {
            $filenameWithExt = $request->file('file_sop')->getClientOriginalName();
            $filename = 'SOP-' . $request->category;
            $extension = $request->file('file_sop')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('file_sop')->storeAs('public/uploads/sop', $filenameSimpan);
        }

        DB::beginTransaction();

        $data = new SopModel;

        // $data->fill($request->all());
        $data->name = $request->name;
        $data->category = $request->category;
        $data->file_name = $filenameSimpan;
        $data->status = 0;

        $data->save();

        DB::commit();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    public function update(Request $request)
    {
        // return json_encode($request);
        $validate = Validator::make($request->all(), [
            'status' => 'required'
        ])->setAttributeNames([
            'status' => 'Status SOP',
        ]);

        // var_dump($validate);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();



        // $data = SopModel::findOrfail(1);
        $data = SopModel::findOrfail($request->id_sop);


        // $data->fill($request->all());
        $data->status = $request->status;
        $data->updated_at = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil diubah.',
            'data' => $data
        );

        return json_encode($response);
    }

    public function destroy($id) {
    $data = SopModel::findOrfail($id)->delete();

    $response = array (
    'status' => true,
    'message' => 'Data berhasil dihapus.'
    );

    return json_encode($response);
    }
}
