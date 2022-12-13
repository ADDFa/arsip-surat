<?php

namespace App\Http\Controllers;

class Utils
{
    static private $date = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    static public function getDates()
    {
        return self::$date;
    }
}
