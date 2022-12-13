@extends('layouts.main')

@section('content')
<h1>
    Detail Pengguna
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<div role="" class="col-lg-8 mx-auto user-profile">
    <figure class="text-center">
        <img src="{{ asset('storage/images/' . $user->avatar ?? 'samsudin.jpg') }}" alt="{{ $user->avatar }}">
        <figcaption>{{ $user->name }}</figcaption>
    </figure>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control text-capitalize" value="{{ $user->name }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="text" class="form-control text-capitalize" value="{{ $user->role }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" value="{{ $user->credential->username }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" value="{{ $user->credential->email }}" disabled>
    </div>
    <div class="mt-5 d-flex gap-2 justify-content-end">
        <a href="/pengguna" class="btn btn-warning">Kembali</a>
    </div>
</div>
@endsection