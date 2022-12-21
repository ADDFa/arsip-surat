@extends('layouts.main')

@section('content')
<h1>
    Tambah Data Surat Masuk
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="col-lg-10 mx-auto" role="main-content">
    <form action="/surat-masuk" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="mailNumber" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control {{ $errors->has('mailNumber') ? 'is-invalid' : '' }}" id="mailNumber"
                name="mailNumber" aria-describedby="mailNumberHelp mailNumberFeedback" value="{{ old('mailNumber') }}">
            <div id="mailNumberFeedback" class="invalid-feedback">{{ $errors->first('mailNumber') }}</div>
            <div id="mailNumberHelp" class="form-text">Masukkan Nomor Surat</div>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Surat Masuk</label>
            <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="date" name="date"
                aria-describedby="dateHelp dateFeedback" value="{{ old('date') }}">
            <div id="dateFeedback" class="invalid-feedback">{{ $errors->first('date') }}</div>
            <div id="dateHelp" class="form-text">Masukkan Tanggal Surat Masuk</div>
        </div>
        <div class="mb-3">
            <label for="mailNature" class="form-label">Sifat Surat</label>
            <input type="text" class="form-control {{ $errors->has('mailNature') ? 'is-invalid' : '' }}" id="mailNature"
                name="mailNature" value="{{ old('mailNature') }}" aria-describedby="mailNatureHelp mailNatureFeedback">
            <div id="mailNatureFeedback" class="invalid-feedback">{{ $errors->first('mailNature') }}</div>
            <div id="mailNatureHelp" class="form-text">Masukkan Jenis Surat Masuk</div>
        </div>
        <div class="mb-3">
            <label for="mailCategory" class="form-label">Kategori Surat</label>
            <input type="mailCategory" class="form-control {{ $errors->has('mailCategory') ? 'is-invalid' : '' }}"
                id="mailCategory" name="mailCategory" value="{{ old('mailCategory') }}"
                aria-describedby="mailCategoryHelp mailCategoryFeedback">
            <div id="mailCategoryFeedback" class="invalid-feedback">{{ $errors->first('mailCategory') }}</div>
            <div id="mailCategoryHelp" class="form-text">Masukkan Kategori Surat Masuk</div>
        </div>
        <div class="mb-3">
            <label for="regardingMail" class="form-label">Perihal Surat</label>
            <input type="regardingMail" class="form-control {{ $errors->has('regardingMail') ? 'is-invalid' : '' }}"
                id="regardingMail" name="regardingMail" value="{{ old('regardingMail') }}"
                aria-describedby="regardingMailHelp regardingMailFeedback">
            <div id="regardingMailFeedback" class="invalid-feedback">{{ $errors->first('regardingMail') }}</div>
            <div id="regardingMailHelp" class="form-text">Masukkan Perihal Surat Masuk</div>
        </div>
        <div class="mb-3">
            <label for="sender" class="form-label">Pengirim</label>
            <input type="sender" class="form-control {{ $errors->has('sender') ? 'is-invalid' : '' }}" id="sender"
                name="sender" value="{{ old('sender') }}" aria-describedby="senderHelp senderFeedback">
            <div id="senderFeedback" class="invalid-feedback">{{ $errors->first('sender') }}</div>
            <div id="senderHelp" class="form-text">Masukkan Pengirim Surat</div>
        </div>
        <div class="mb-3">
            <label for="mailFile" class="form-label">File Surat</label>
            <input type="file" name="mailFile" id="mailFile"
                class="form-control {{ $errors->has('mailFile') ? 'is-invalid' : '' }}"
                aria-describedby="mailFileHelp mailFileFeedback">
            <div id="mailFileFeedback" class="invalid-feedback">{{ $errors->first('mailFile') }}</div>
            <div id="mailFileHelp" class="form-text">Masukkan File Surat</div>
        </div>
        <div class="mb-3 d-flex justify-content-end gap-2">
            <a href="/surat-masuk" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection