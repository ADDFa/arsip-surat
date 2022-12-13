@extends('layouts.main')

@section('content')
<h1>
    Tambah Data Pengguna
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="col-lg-10 mx-auto" role="main-content">
    <div class="mb-3">
        <label class="form-label">Nomor Surat</label>
        <input type="text" class="form-control" value="{{ $outgoingMail->mail_number }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Surat Keluar</label>
        <input type="text" class="form-control"
            value="{{ date('d', $outgoingMail->date) . ' ' . $month . ' ' . date('Y', $outgoingMail->date) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Surat</label>
        <input type="text" class="form-control" value="{{ $outgoingMail->mail_nature }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori Surat</label>
        <input type="mailCategory" class="form-control" value="{{ $outgoingMail->mail_category }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Tujuan Surat</label>
        <input type="mailDestination" class="form-control" value="{{ $outgoingMail->mail_destination }}">
    </div>
    <div class="mb-3 d-flex justify-content-end gap-2">
        <a href="/surat-keluar" class="btn btn-secondary">Kembali</a>
        <a href="/surat-keluar/{{ $outgoingMail->id }}/edit" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection