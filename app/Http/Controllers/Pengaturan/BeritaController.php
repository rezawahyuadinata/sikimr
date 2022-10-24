<?php

namespace App\Http\Controllers\Pengaturan;

use App\Model\Pengaturan\BeritaModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MYController;
use App\Model\Pengaturan\BeritaCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

class BeritaController extends MYController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->data;

        $data->news_category = BeritaCategoryModel::all();

        // dd($data);
        return view($this->data->page->file_view, compact('data'));
        // return view('pengaturan.gallery.gallery-index');
        // return 'Ini Berita';
    }

    public function read(Request $request)
    {
        $queryBuilder = DB::table('tbl_beritas')->select('*');

        return DataTables::queryBuilder($queryBuilder)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            ['thumbnail' => 'required|max:10000|mimes:jpg,png'],
            'subject' => 'required',
            'editor' => 'required',
            'news_category' => 'required',
        ])->setAttributeNames([
            'thumbnail' => 'Thumbnail',
            'subject' => 'Judul',
            'editor' => 'Deskripsi',
            'news_category' => 'Kategori',
            'slug' => 'Slug',
        ]);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }

        $filesThumbnail = $request->file('thumbnail');
        $images = array();

        if ($filesThumbnail) {
            foreach ($filesThumbnail as $file) {


                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 5; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

                $filename = $file->getClientOriginalName();
                // $extension = $file->getClientOriginalExtension();
                // $filenameSimpan = $filename . '_' . time() . $randomString .  '.' . $extension;
                $path = $file->storeAs('public/uploads/berita', $filename);
                // $file->move('image', $name);
                $images[] = $filename;
            }
        }

        $slug = Str::slug($request->subject, '-');

        DB::beginTransaction();

        $data = new BeritaModel;

        // $data->fill($request->all());
        $data->subject = $request->subject;
        $data->description = $request->editor;
        $data->category = $request->news_category;
        $data->thumbnail = implode("|", $images);
        $data->slug = $slug;

        $data->save();

        DB::commit();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil disimpan.'
        );
        // $response = array(
        //     'status' => true,
        //     'message' => $filenameSimpan,
        // );

        return json_encode($response);
        // return '$request->file';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            ['thumbnail' => 'required|max:10000|mimes:jpg,png'],
            'subject' => 'required',
            'editor' => 'required',
            'news_category' => 'required',
        ])->setAttributeNames([
            'id' => 'Data',
            'thumbnail' => 'Thumbnail',
            'subject' => 'Judul',
            'editor' => 'Deskripsi',
            'news_category' => 'Kategori',
            'slug' => 'Slug',
        ]);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }

        $data = BeritaModel::findOrfail($request->id);
        $dataGambar = explode("|", $data['thumbnail']);
        foreach ($dataGambar as $item) {
            unlink(storage_path('app/public/uploads/berita/' . $item));
        }

        $slug = Str::slug($request->subject, '-');

        $filesThumbnail = $request->file('thumbnail');
        $images = array();

        if ($filesThumbnail) {
            foreach ($filesThumbnail as $file) {


                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 5; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

                $filename = $file->getClientOriginalName();
                // $extension = $file->getClientOriginalExtension();
                // $filenameSimpan = $filename . '_' . time() . $randomString .  '.' . $extension;
                $path = $file->storeAs('public/uploads/berita', $filename);
                // $file->move('image', $name);
                $images[] = $filename;
            }
        }



        DB::beginTransaction();


        // $data->fill($request->all());
        $data->subject = $request->subject;
        $data->description = $request->editor;
        $data->category = $request->news_category;
        $data->thumbnail = implode("|", $images);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BeritaModel::findOrfail($id);
        $dataGambar = explode("|", $data['thumbnail']);
        foreach ($dataGambar as $item) {
            unlink(storage_path('app/public/uploads/berita/' . $item));
        }
        $data->delete();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil dihapus.'
        );

        return json_encode($response);
    }
}
