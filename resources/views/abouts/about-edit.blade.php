@extends('layouts.main')

@section('content')
<h1>
    Tambah Data Pengguna
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="col-lg-10 mx-auto" role="main-content">
    <form action="/tentang" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="noTelp" class="form-label">Nomor Telepon SMAN 8 Bengkulu</label>
            <input type="text" class="form-control {{ $errors->has('noTelp') ? 'is-invalid' : '' }}" id="noTelp"
                name="noTelp" aria-describedby="noTelpHelp noTelpFeedback"
                value="{{ $about->telephone_number ?? old('noTelp') }}">
            <div id="noTelpFeedback" class="invalid-feedback">{{ $errors->first('noTelp') }}</div>
            <div id="noTelpHelp" class="form-text">Masukkan Nomor Telepon SMAN 8 Bengkulu</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email SMAN 8 Bengkulu</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                name="email" aria-describedby="emailHelp emailFeedback" value="{{ $about->email ?? old('email') }}">
            <div id="emailFeedback" class="invalid-feedback">{{ $errors->first('email') }}</div>
            <div id="emailHelp" class="form-text">Masukkan Email SMAN 8 Bengkulu</div>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat SMAN 8 Bengkulu</label>
            <input type="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address"
                name="address" aria-describedby="addressHelp addressFeedback"
                value="{{ $about->address ?? old('address') }}">
            <div id="addressFeedback" class="invalid-feedback">{{ $errors->first('address') }}</div>
            <div id="addressHelp" class="form-text">Masukkan Alamat SMAN 8 Bengkulu</div>
        </div>
        <div class="mb-3 row">
            <div class="col-lg-6">
                <label for="headMaster" class="form-label">Kepala Sekolah SMAN 8 Bengkulu</label>
                <input type="text" class="form-control {{ $errors->has('headMaster') ? 'is-invalid' : '' }}"
                    id="headMaster" name="headMaster" value="{{ $about->head_master ?? old('headMaster') }}"
                    aria-describedby="headMasterHelp headMasterFeedback">
                <div id="headMasterFeedback" class="invalid-feedback">{{ $errors->first('headMaster') }}</div>
                <div id="headMasterHelp" class="form-text">Kepala Sekloah SMAN 8 Bengkulu</div>
            </div>
            <div class="col-lg-6">
                <label for="nipHeadMaster" class="form-label">NIP Kepala Sekolah SMAN 8 Bengkulu</label>
                <input type="nipHeadMaster" class="form-control {{ $errors->has('nipHeadMaster') ? 'is-invalid' : '' }}"
                    id="nipHeadMaster" name="nipHeadMaster" value="{{ $about->nip ?? old('nipHeadMaster') }}"
                    aria-describedby="nipHeadMasterHelp nipHeadMasterFeddback">
                <div id="nipHeadMasterFeddback" class="invalid-feedback">{{ $errors->first('nipHeadMaster') }}</div>
                <div id="nipHeadMasterHelp" class="form-text">NIP Kepala Sekolah SMAN 8 Bengkulu</div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end gap-2">
            <a href="/surat-keluar" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
@endsection