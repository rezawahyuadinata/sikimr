<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MYController;
use App\Model\Pengaturan\GalleryModel;
use Illuminate\Support\Facades\DB;
use Auth;
use Str;
use Storage;

use DataTables;
use Validator;

class GalleryController extends MYController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->data;

        // dd($data);
        return view($this->data->page->file_view, compact('data'));
        // return view('pengaturan.gallery.gallery-index');
    }

    public function read(Request $request)
    {
        $queryBuilder = DB::table('galleries')->select('*');

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
        // return 'Hellow';



        $validate = Validator::make($request->all(), [
            'file_name' => 'required|max:300000|mimes:jpg,png,mp4',
            'category' => 'required',
            'caption' => 'required',
        ])->setAttributeNames([
            'file_name' => 'Nama File',
            'category' => 'Kategori',
            'caption' => 'Caption',
        ]);

        if ($validate->fails()) {

            $response = [
                'status' => false,
                'message' => $validate->errors()
            ];
            return json_encode($response);
        }

        if ($request->file('file_name')) {
            $filenameWithExt = $request->file('file_name')->getClientOriginalName();
            $filename = $request->category;
            $extension = $request->file('file_name')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('file_name')->storeAs('public/uploads/gallery', $filenameSimpan);
        }

        DB::beginTransaction();

        $data = new GalleryModel;

        // $data->fill($request->all());
        $data->file_name = $filenameSimpan;
        $data->file_category = $request->category;
        $data->caption = $request->caption;

        $data->save();

        DB::commit();

        $response = array(
            'status' => true,
            'message' => 'Data berhasil disimpan.'
        );

        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
