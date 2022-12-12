<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Disposition;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\About;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'Dashboard | Arsip Surat',
            'script'            => 'dashboard',
            'amount'            => (object) [
                'user'          => User::all()->count(),
                'disposition'   => Disposition::all()->count(),
                'incoming'      => IncomingMail::all()->count(),
                'outgoing'      => OutgoingMail::all()->count(),
            ]
        ];

        return view('dashboard', $data);
    }
}
