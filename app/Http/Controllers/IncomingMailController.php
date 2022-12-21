<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use App\Models\Disposition;

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

    private function dispositionValidation(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'regardingMail'             => 'required|max:30',
                'fromUnit'                  => 'required|max:30',
                'dispositionDestination'    => 'required|max:30',
                'dispositionContent'        => 'required'
            ],
            [
                'required'                  => 'Kolom :attribute Harus Diisi',
                'max'                       => 'Kolom :attribute Maksimnal :max Karakter'
            ]
        );
    }

    private function getDispositionData(Request $request)
    {
        return [
            'incoming_mail_id'          => $request->incomingMailId,
            'user_id'                   => $request->userId,
            'regarding_mail'            => $request->regardingMail,
            'from_unit'                 => $request->fromUnit,
            'disposition_destination'   => $request->dispositionDestination,
            'disposition_content'       => $request->dispositionContent
        ];
    }

    public function disposition(Request $request)
    {
        $validator = $this->dispositionValidation($request);

        if ($validator->fails()) return response()->json(['errors'  => $validator->errors()]);

        $disposition = Disposition::where('incoming_mail_id', $request->incomingMailId)->get()->first();
        $data = $this->getDispositionData($request);

        if (!$disposition) Disposition::create($data);
        if ($disposition) $disposition->update($data);

        return response()->json([
            'message'   => 'Berhasil Mendisposisikan Surat'
        ]);
    }
}
