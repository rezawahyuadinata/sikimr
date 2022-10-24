<?php

namespace App\Http\Controllers\Mailer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MYController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Jobs\SendEmailJob;

class NotifEmailController extends Controller
{
    public function index()
    {
        // dd($this->data);

        $details['email'] = 'adinatarezawahyu@gmail.com';
        $details['nama'] = 'WAHYUUUU';

        // dispatch(new SendEmailJob($details));

        // dd('done');

        // $isi_email = [
        //     'title' => 'Notifikasi Pemberitahuan Pelaksaan Risiko',
        //     'body' => 'Selamat Datang'
        // ];

        // $tujuan = 'test@gmail.com';

        // Mail::to($tujuan)->send(new NotifyMail($isi_email));

        return 'Berhasil Mengirim Email';
    }
}
