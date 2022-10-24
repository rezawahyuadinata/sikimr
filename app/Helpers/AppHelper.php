<?php
namespace App\Helpers;

use Carbon\Carbon;
use DB;

class AppHelper{
    public static function BulanRomawi($bulan) {
        $array_romawi = array(
            '1'     => 'I',
            '01'    => 'I',
            '2'     => 'II',
            '02'    => 'II',
            '3'     => 'III',
            '03'    => 'III',
            '4'     => 'IV',
            '04'    => 'IV',
            '5'     => 'V',
            '05'    => 'V',
            '6'     => 'VI',
            '06'    => 'VI',
            '7'     => 'VII',
            '07'    => 'VII',
            '8'     => 'VIII',
            '08'     => 'VIII',
            '9'     => 'IX',
            '09'     => 'IX',
            '10'    => 'X',
            '11'    => 'XI',
            '12'    => 'XII',
        );

        return $array_romawi[$bulan];
    }

    public static function StrReplace($value) {
        $new_value = str_replace(".", "", $value);
        return str_replace(",", ".", $new_value);
    }

    public static function NumberFormat($value, $decimal = 0) {
        return number_format($value, $decimal, ',', '.');
    }

    public static function DateFormat($date, $format = 'd-m-Y') {
        return Carbon::createFromFormat($format, $date)->toDateString();
    }

    public static function DateIndo($date, $format='d-m-Y') {
        return date($format, strtotime($date));
    }

    public static function MonthIndo() {
        $arrNamaBulan = array(
            '01'=>'Januari', 
            '02'=>'Februari', 
            '03'=>'Maret', 
            '04'=>'April', 
            '05'=>'Mei', 
            '06'=>'Juni', 
            '07'=>'Juli', 
            '08'=>'Agustus', 
            '09'=>'September', 
            '10'=>'Oktober', 
            '11'=>'November', 
            '12'=>'Desember');

        return $arrNamaBulan;
    }

    public static function getMonthIndo($bulan = '') {
		switch ($bulan) {
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
            case '01':
                return "Januari";
                break;
            case '02':
                return "Februari";
                break;
            case '03':
                return "Maret";
                break;
            case '04':
                return "April";
                break;
            case '05':
                return "Mei";
                break;
            case '06':
                return "Juni";
                break;
            case '07':
                return "Juli";
                break;
            case '08':
                return "Agustus";
                break;
            case '09':
                return "September";
                break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}

    public static function NumberText($x){
        $_this = new self;
        $x = abs($x);
        $angka = array("", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($x <12) {
            $temp = " ". $angka[$x];
        } else if ($x < 20) {
            $temp = $_this->NumberText($x - 10). " belas";
        } else if ($x < 100) {
            $temp = $_this->NumberText($x/10)." puluh". $_this->NumberText($x % 10);
        } else if ($x < 200) {
            $temp = " seratus" . $_this->NumberText($x - 100);
        } else if ($x < 1000) {
            $temp = $_this->NumberText($x/100) . " ratus" . $_this->NumberText($x % 100);
        } else if ($x < 2000) {
            $temp = " seribu" . $_this->NumberText($x - 1000);
        } else if ($x < 1000000) {
            $temp = $_this->NumberText($x/1000) . " ribu" . $_this->NumberText($x % 1000);
        } else if ($x < 1000000000) {
            $temp = $_this->NumberText($x/1000000) . " juta" . $_this->NumberText($x % 1000000);
        } else if ($x < 1000000000000) {
            $temp = $_this->NumberText($x/1000000000) . " milyar" . $_this->NumberText(fmod($x,1000000000));
        } else if ($x < 1000000000000000) {
            $temp = $_this->NumberText($x/1000000000000) . " trilyun" . $_this->NumberText(fmod($x,1000000000000));
        }

        return $temp;
    }

    public static function status($verifikasi)
    {
        switch ($verifikasi) {
            case '0':
                $text = 'Draft';
                break;

            case '1':
                $text = 'Menunggu Verifikasi UKI (UKER / UPT)';
                break;

            case '2':
                $text = 'Menunggu Verifikasi UKI (UNOR)';
                break;

            case '3':
                $text = 'Terverifikasi';
                break;
            
            default:
                $text = 'Draft';
                break;
        }

        return $text;
    }
}