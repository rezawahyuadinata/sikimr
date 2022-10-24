<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

//MODEL//
use App\Model\Pengaturan\FaqModel;

class FaqController extends MYController
{
    public function index() {
        $data = $this->data;
        return view($this->data->page->file_view, compact('data'));
    }

    public function read(Request $request) {
        $queryBuilder = DB::table('tbl_faq')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'question'   => 'required',
            'answer'   => 'required',
        ])->setAttributeNames([
            'question'   => 'Pertanyaan',
            'answer'   => 'Jawaban',
        ]);

        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = new FaqModel;

        $data->fill($request->all());
        $data->createdAt  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    public function update(Request $request) {
        $validate = Validator::make($request->all(), [
            'id'   => 'required',
            'question'   => 'required',
            'answer'   => 'required',
        ])->setAttributeNames([
            'id'   => 'Data',
            'question'   => 'Pertanyaan',
            'answer'   => 'Jawaban',
        ]);

        if ($validate->fails()) {

            $response = [
                'status'    => false,
                'message'   => $validate->errors()
            ];
            return json_encode($response);
        }

        DB::beginTransaction();

        $data = FaqModel::findOrfail($request->id);

        $data->fill($request->all());
        $data->updatedAt  = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id) {
        $data = FaqModel::findOrfail($id)->delete();

        $response = array (
            'status'    => true,
            'message'   => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
