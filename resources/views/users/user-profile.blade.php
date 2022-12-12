@extends('layouts.main')

@section('content')

<style>
    .user-profile figure {
        padding: 3rem;
        background-color: #FAF6F0;
        border-radius: 2rem;
    }

    .user-profile img {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        margin-bottom: 1rem;
        box-shadow: 0 0 8px 4px #fff;
    }
</style>

<div class="col-lg-8 mx-auto user-profile">
    <figure class="text-center">
        <img src="{{ asset('storage/images/' . session('user')->avatar ?? 'samsudin.jpg') }}"
            alt="{{ session('user')->avatar }}">
        <figcaption>{{ session('user')->name }}</figcaption>
    </figure>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/pengguna/{{ $credential->username }}/edit-profil" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') ??  $credential->user->name }}" {{
                $edit ?? 'disabled' }} required>
        </div>
        {{-- show only --}}
        @if (!isset($edit))
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value="{{ $credential->user->role }}" {{ $edit ?? 'disabled' }}>
        </div>
        @endif
        {{-- end show only --}}
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control"
                value="{{ old('username') ?? $credential->username }}" {{ $edit ?? 'disabled' }} required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') ?? $credential->email }}" {{
                $edit ?? 'disabled' }} required>
        </div>
        {{-- edit only --}}
        @if ($edit ?? false)
        <div class="mb-3">
            <label class="form-label">Ganti Password</label>
            <input type="text" name="changePassword" class="form-control" value="{{ old('changePassword') }}"
                aria-describedby="update-password-help">
            <div id="update-password-help" class="form-text">Kosongkan Jika Tidak Ingin Mengganti Password</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Ganti Foto Profil</label>
            <input type="file" name="avatar" class="form-control">
            <div id="update-password-help" class="form-text">Kosongkan Jika Tidak Ingin Mengganti Foto Profil</div>
        </div>
        <div class="mb-3">
            <label class="form-label text-danger">*Password Lama</label>
            <input type="password" name="oldPassword" class="form-control" required>
            <div id="update-password-help" class="form-text text-danger">Beritahu Kami Jika Ini Memang Anda
            </div>
        </div>
        @endif
        {{-- end edit only --}}

        <div class="mb-3 d-flex justify-content-end gap-2">
            {{-- button edit --}}
            @if (!isset($edit))
            <a href="edit-profil/edit" class="btn btn-warning text-light">Edit Profil</a>
            @endif
            {{-- end button edit --}}

            {{-- button save --}}
            @if ($edit??false)
            <a href="/pengguna/{{ $credential->username }}/edit-profil" class="btn btn-warning text-light">Kembali</a>
            <button class="btn btn-danger text-light">Simpan Perubahan</button>
            @endif
            {{-- end button save --}}
        </div>
    </form>
</div>

@endsection