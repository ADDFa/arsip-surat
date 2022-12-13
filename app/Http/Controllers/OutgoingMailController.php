<?php

namespace App\Http\Controllers;

use App\Models\OutgoingMail;
use App\Http\Controllers\Utils;
use Illuminate\Http\Request;

class OutgoingMailController extends Controller
{
    private function outgoingMailValidate($request, $update = false)
    {
        $validate = [
            'mailNumber'        => 'required|max:30',
            'date'              => 'required|max:20',
            'mailNature'        => 'required|max:20',
            'mailCategory'      => 'required|max:30',
            'mailDestination'   => 'required|max:40'
        ];

        if (!$update) $validate['mailNumber'] .= '|unique:outgoing_mails,mail_number';

        return $request->validate($validate);
    }

    private function getOutgoingMailData($request)
    {
        return $outgoingMailData = [
            'mail_number'               => $request->mailNumber,
            'date'                      => strtotime($request->date),
            'mail_nature'               => $request->mailNature,
            'mail_category'             => $request->mailCategory,
            'mail_destination'          => $request->mailDestination
        ];
    }

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
        $data = [
            'Tambah Surat Keluar | Arsip Surat'
        ];

        return view('mails.outgoing-insert', $data);
    }

    public function store(Request $request)
    {
        $this->outgoingMailValidate($request);
        OutgoingMail::create($this->getOutgoingMailData($request));

        return redirect('/surat-keluar')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Menambahkan Data Surat Keluar'
        ]);
    }

    public function show(OutgoingMail $outgoingMail)
    {
        $month = (int) date('m', $outgoingMail->date);
        $month -= 1;

        $data = [
            'title'         => 'Detail Surat Keluar',
            'outgoingMail'  => $outgoingMail,
            'month'         => Utils::getDates()[$month]
        ];

        return view('mails.outgoing-detail', $data);
    }

    public function edit(OutgoingMail $outgoingMail)
    {
        $data = [
            'title'         => 'Ubah Data Surat Keluar',
            'outgoingMail'  => $outgoingMail
        ];

        return view('mails.outgoing-edit', $data);
    }

    public function update(Request $request, OutgoingMail $outgoingMail)
    {
        $this->outgoingMailValidate($request, true);

        OutgoingMail::where('id', $outgoingMail->id)->update($this->getOutgoingMailData($request));

        return redirect('/surat-keluar')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Mengubah Data Surat Keluar'
        ]);
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
