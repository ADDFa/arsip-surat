@extends('layouts.main')

@section('content')
<h1>
    Tambah Data Pengguna
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="col-lg-10 mx-auto" role="main-content">
    <form action="/surat-keluar/{{ $outgoingMail->id }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="mailNumber" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control {{ $errors->has('mailNumber') ? 'is-invalid' : '' }}" id="mailNumber"
                name="mailNumber" aria-describedby="mailNumberHelp mailNumberFeedback"
                value="{{ $outgoingMail->mail_number ?? old('mailNumber') }}">
            <div id="mailNumberFeedback" class="invalid-feedback">{{ $errors->first('mailNumber') }}</div>
            <div id="mailNumberHelp" class="form-text">Masukkan Nomor Surat</div>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Surat Keluar</label>
            <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="date" name="date"
                aria-describedby="dateHelp dateFeedback"
                value="{{ date('Y-m-d', $outgoingMail->date) ?? old('date') }}">
            <div id="dateFeedback" class="invalid-feedback">{{ $errors->first('date') }}</div>
            <div id="dateHelp" class="form-text">Masukkan Tanggal Surat Keluar</div>
        </div>
        <div class="mb-3">
            <label for="mailNature" class="form-label">Jenis Surat</label>
            <input type="text" class="form-control {{ $errors->has('mailNature') ? 'is-invalid' : '' }}" id="mailNature"
                name="mailNature" value="{{ $outgoingMail->mail_nature ?? old('mailNature') }}"
                aria-describedby="mailNatureHelp mailNatureFeedback">
            <div id="mailNatureFeedback" class="invalid-feedback">{{ $errors->first('mailNature') }}</div>
            <div id="mailNatureHelp" class="form-text">Masukkan Jenis Surat Keluar</div>
        </div>
        <div class="mb-3">
            <label for="mailCategory" class="form-label">Kategori Surat</label>
            <input type="mailCategory" class="form-control {{ $errors->has('mailCategory') ? 'is-invalid' : '' }}"
                id="mailCategory" name="mailCategory" value="{{ $outgoingMail->mail_category ?? old('mailCategory') }}"
                aria-describedby="mailCategoryHelp mailCategoryFeddback">
            <div id="mailCategoryFeddback" class="invalid-feedback">{{ $errors->first('mailCategory') }}</div>
            <div id="mailCategoryHelp" class="form-text">Masukkan Kategori Surat Keluar</div>
        </div>
        <div class="mb-3">
            <label for="mailDestination" class="form-label">Tujuan Surat</label>
            <input type="mailDestination" class="form-control {{ $errors->has('mailDestination') ? 'is-invalid' : '' }}"
                id="mailDestination" name="mailDestination"
                value="{{ $outgoingMail->mail_destination ?? old('mailDestination') }}"
                aria-describedby="mailDestinationHelp mailDestinationFeddback">
            <div id="mailDestinationFeddback" class="invalid-feedback">{{ $errors->first('mailDestination') }}</div>
            <div id="mailDestinationHelp" class="form-text">Masukkan Status Pengguna</div>
        </div>
        <div class="mb-3 d-flex justify-content-end gap-2">
            <a href="/surat-keluar" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
@endsection