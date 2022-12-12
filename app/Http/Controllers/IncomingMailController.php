<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use Illuminate\Http\Request;

class IncomingMailController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Surat Masuk | Arsip Surat',
            'mails' => IncomingMail::all()
        ];

        return view('mails.incoming', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(IncomingMail $incomingMail)
    {
        return $incomingMail;
    }

    public function edit(IncomingMail $incomingMail)
    {
        //
    }

    public function update(Request $request, IncomingMail $incomingMail)
    {
        //
    }

    public function destroy(IncomingMail $incomingMail)
    {
        $incomingMail->delete();

        return redirect('/surat-masuk');
    }

    public function report()
    {
        $data = [
            'title'     => 'Laporan Surat Masuk | Arsip Surat'
        ];

        return view('mails.incoming-report', $data);
    }
}
