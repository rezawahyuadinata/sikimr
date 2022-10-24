<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class DownloadFileController extends Controller
{
    public function downloadfile_pemantauan($data_pemantauan)
    {
        $file = public_path('/media/pemantauan/file_pemantauan/'.$data_pemantauan);
        return Response::download($file, $data_pemantauan);
    }

    public function downloadfile_telaahan($data_telaahan)
    {
        $file = public_path('/media/telaahan/file_telaahan/'.$data_telaahan);
        return Response::download($file, $data_telaahan);
    }
}
