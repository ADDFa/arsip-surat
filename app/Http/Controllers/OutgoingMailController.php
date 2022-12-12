<?php

namespace App\Http\Controllers;

use App\Models\OutgoingMail;
use Illuminate\Http\Request;

class OutgoingMailController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Surat Keluar | Arsip Surat',
            'mails'     => OutgoingMail::all()
        ];

        return view('mails.outgoing', $data);
    }

    public function create()
    {
        return view('mails.outgoing-insert');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(OutgoingMail $outgoingMail)
    {
        $data = [];

        return view('mails.outgoing-detail');
    }

    public function edit(OutgoingMail $outgoingMail)
    {
        return view('mails.outgoing-edit');
    }

    public function update(Request $request, OutgoingMail $outgoingMail)
    {
        //
    }

    public function destroy(OutgoingMail $outgoingMail)
    {
        $outgoingMail->delete();

        return redirect('/surat-keluar')->with([
            'icon'      => 'success',
            'message'  => 'Berhasil Menghapus Surat Keluar'
        ]);
    }

    public function report()
    {
        $data = [
            'title'     => 'Laporan Surat Keluar | Arsip Surat'
        ];

        return view('mails.outgoing-report', $data);
    }
}
