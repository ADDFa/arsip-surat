<?php

namespace App\Http\Controllers;

use App\Models\OutgoingMail;
use App\Http\Controllers\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class OutgoingMailController extends Controller
{
    private string $path = 'public/files/outgoing-mail';

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

    private function outgoingMailFileValidate($request)
    {
        return Validator::validate(
            $request->file(),
            [
                'mailFile' => [
                    'required',
                    File::types(['docx', 'pdf'])->max(1024 * 2)
                ]
            ],
            [
                'required'      => 'Dokumen Wajib Diisi',
                'mimes'         => 'Tipe Dokumen .docx atau .pdf',
                'max'           => 'Dokumen Maksimal 2MB'
            ]
        );
    }

    private function getOutgoingMailData($request)
    {
        return [
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
        $this->outgoingMailFileValidate($request);

        $outgoingMail = OutgoingMail::create($this->getOutgoingMailData($request));

        // input file
        $request->file('mailFile')->storeAs($this->path, "{$outgoingMail->id}.{$request->mailFile->extension()}");

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

        // cek file diupdate
        if (!is_null($request->mailFile)) {
            $this->outgoingMailFileValidate($request);

            // hapus file lama dan update file baru
            Storage::delete("{$this->path}/{$outgoingMail->id}.docx");
            Storage::delete("{$this->path}/{$outgoingMail->id}.pdf");

            $request->mailFile->storeAs($this->path, "{$outgoingMail->id}.{$request->mailFile->extension()}");
        }

        OutgoingMail::where('id', $outgoingMail->id)->update($this->getOutgoingMailData($request));

        return redirect('/surat-keluar')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Mengubah Data Surat Keluar'
        ]);
    }

    public function destroy(OutgoingMail $outgoingMail)
    {
        // hapus file
        Storage::delete("{$this->path}/{$outgoingMail->id}.docx");
        Storage::delete("{$this->path}/{$outgoingMail->id}.pdf");

        // hapus data didatabase
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
