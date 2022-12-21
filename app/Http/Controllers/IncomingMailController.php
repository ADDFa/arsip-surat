<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class IncomingMailController extends Controller
{
    private string $path = 'public/files/incoming-mail';

    private function incomingMailValidate($request, bool $update = false)
    {
        $validate = [
            'mailNumber'        => 'required|max:30',
            'date'              => 'required|max:20',
            'mailNature'        => 'required|max:20',
            'mailCategory'      => 'required|max:30',
            'regardingMail'     => 'required|max:30',
            'sender'            => 'required|max:40'
        ];

        if (!$update) $validate['mailNumber'] .= '|unique:incoming_mails,mail_number';

        return $request->validate($validate);
    }

    private function incomingMailFileValidate($request)
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

    private function getIncomingMailData($request)
    {
        return [
            'mail_number'               => $request->mailNumber,
            'date'                      => strtotime($request->date),
            'mail_nature'               => $request->mailNature,
            'mail_category'             => $request->mailCategory,
            'regarding_mail'            => $request->regardingMail,
            'sender'                    => $request->sender
        ];
    }

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
        $data = [
            'title' => 'Tambah Surat Masuk | Arsip Surat'
        ];

        return view('mails.incoming-insert', $data);
    }

    public function store(Request $request)
    {
        $this->incomingMailValidate($request);
        $this->incomingMailFileValidate($request);

        $incomingMail = IncomingMail::create($this->getIncomingMailData($request));

        // input file
        $request->mailFile->storeAs($this->path, "{$incomingMail->id}.{$request->mailFile->extension()}");

        return redirect('/surat-masuk')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Menambahkan Data Surat Masuk'
        ]);
    }

    public function show(IncomingMail $incomingMail)
    {
        return $incomingMail;
    }

    public function edit(IncomingMail $incomingMail)
    {
        $data = [
            'title'             => 'Ubah Data Surat Masuk',
            'incomingMail'      => $incomingMail
        ];

        return view('mails.incoming-edit', $data);
    }

    public function update(Request $request, IncomingMail $incomingMail)
    {
        $this->incomingMailValidate($request, true);

        if (!is_null($request->mailFile)) {
            $this->incomingMailFileValidate($request);

            // hapus file lama dan update file baru
            Storage::delete("{$this->path}/{$incomingMail->id}.docx");
            Storage::delete("{$this->path}/{$incomingMail->id}.pdf");

            $request->mailFile->storeAs($this->path, "{$incomingMail->id}.{$request->mailFile->extension()}");
        }

        IncomingMail::where('id', $incomingMail->id)->update($this->getIncomingMailData($request));

        return redirect('/surat-masuk')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Mengubah Data Surat Masuk'
        ]);
    }

    public function destroy(IncomingMail $incomingMail)
    {
        $incomingMail->delete();
        Storage::delete("{$this->path}/{$incomingMail->id}.docx");
        Storage::delete("{$this->path}/{$incomingMail->id}.pdf");

        return redirect('/surat-masuk')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Menghapus Data Surat Masuk'
        ]);
    }

    public function report()
    {
        $data = [
            'title'     => 'Laporan Surat Masuk | Arsip Surat'
        ];

        return view('mails.incoming-report', $data);
    }

    // disposition
    public function test()
    {
        return view('test');
    }

    public function disposition(Request $request)
    {
        echo json_encode($request->toArray());
    }
}
