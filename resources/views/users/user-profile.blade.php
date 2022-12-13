@extends('layouts.main')

@section('content')

<div class="col-lg-8 mx-auto user-profile">
    <figure class="text-center">
        <img src="{{ asset('storage/images/' . session('user')->avatar ?? 'samsudin.jpg') }}"
            alt="{{ session('user')->avatar }}">
        <figcaption>{{ session('user')->name }}</figcaption>
    </figure>

    <form action="/pengguna/{{ $credential->username }}/edit-profil" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') ??  $credential->user->name }}" {{ $edit ?? 'disabled' }}
                aria-describedby="nameFeedback">
            <div id="nameFeedback" class="invalid-feedback">{{ $errors->first('name') }}</div>
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
            <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                value="{{ old('username') ?? $credential->username }}" {{ $edit ?? 'disabled' }}
                aria-describedby="usernameFeedback">
            <div id="usernameFeedback" class="invalid-feedback">{{ $errors->first('username') }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                value="{{ old('email') ?? $credential->email }}" {{ $edit ?? 'disabled' }}
                aria-describedby="emailFeedback">
            <div id="emailFeedback" class="invalid-feedback">{{ $errors->first('role') }}</div>
        </div>
        {{-- edit only --}}
        @if ($edit ?? false)
        <div class="mb-3">
            <label class="form-label">Ganti Password</label>
            <input type="text" name="changePassword"
                class="form-control {{ $errors->has('changePassword') ? 'is-invalid' : '' }}"
                value="{{ old('changePassword') }}" aria-describedby="update-password-help changePasswordFeedback">
            <div id="changePasswordFeedback" class="invalid-feedback">{{ $errors->first('changePassword') }}</div>
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