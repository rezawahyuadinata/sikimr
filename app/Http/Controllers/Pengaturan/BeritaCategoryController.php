<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Model\Pengaturan\BeritaCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use Alert;
use DataTables;
use Validator;

class BeritaCategoryController extends Controller
{

    public function storeCategory(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_name' => 'required',
        ])->setAttributeNames([
            'name' => 'Nama',
            'slug' => 'Slug',
        ]);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }


        $slug = Str::slug($request->category_name, '-');

        DB::beginTransaction();

        $data = new BeritaCategoryModel;

        // // $data->fill($request->all());
        $data->name = $request->category_name;
        $data->slug = $slug;

        $data->save();

        DB::commit();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil disimpan.'
        );

        // Alert::success('Success Title', 'Success Message');
        return json_encode($response);
        // return 'Hello';

        // return redirect()->back()->with('success', 'Kategori Berita Berhasil Di tambahkan !!!');
    }

    public function read(Request $request)
    {
        $queryBuilder = DB::table('tbl_berita_categories')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'category_name' => 'required',
        ])->setAttributeNames([
            'name' => 'Nama',
            'slug' => 'Slug',
        ]);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }

        $data = BeritaCategoryModel::findOrfail($request->id_kategori);

        $slug = Str::slug($request->category_name, '-');

        DB::beginTransaction();

        // // $data->fill($request->all());
        $data->name = $request->category_name;
        $data->slug = $slug;
        $data->updated_at = date('Y-m-d H:i:s');

        $data->save();

        DB::commit();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil diubah.'
        );

        return json_encode($response);
    }

    public function destroy($id)
    {
        $data = BeritaCategoryModel::findOrfail($id);
        $data->delete();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
