<?php

namespace App\Http\Controllers\Pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MYController;
use Auth;

class PengaturanController extends MYController {

    public function index() {
        $data = $this->data;

        return view($this->data->page->file_view, compact('data'));
    }
}