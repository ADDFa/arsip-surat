@extends('layouts.main')

@section('content')
<h1>
    Tambah Data Pengguna
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="col-lg-10 mx-auto" role="main-content">
    <form action="/pengguna" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name"
                aria-describedby="nameHelp nameFeedback" value="{{ old('name') }}">
            <div id="nameFeedback" class="invalid-feedback">{{ $errors->first('name') }}</div>
            <div id="nameHelp" class="form-text">Masukkan Nama Pengguna</div>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Status</label>
            <select class="form-select {{ $errors->has('role') ? 'is-invalid' : '' }}"
                aria-label="Default select example" id="role" name="role" aria-describedby="roleHelp roleFeedback"
                data-select="{{ old('role') }}">
                <option value="sekretaris">Sekretaris</option>
                <option value="kepala-sekolah">Kepala Sekolah</option>
                <option value="admin">Admin</option>
            </select>
            <div id="roleFeedback" class="invalid-feedback">{{ $errors->first('role') }}</div>
            <div id="roleHelp" class="form-text">Masukkan Status Pengguna</div>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username"
                name="username" value="{{ old('username') }}" aria-describedby="usernameHelp usernameFeedback">
            <div id="usernameFeedback" class="invalid-feedback">{{ $errors->first('username') }}</div>
            <div id="usernameHelp" class="form-text">Masukkan Status Pengguna</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                name="email" value="{{ old('email') }}" aria-describedby="emailHelp emailFeddback">
            <div id="emailFeddback" class="invalid-feedback">{{ $errors->first('username') }}</div>
            <div id="emailHelp" class="form-text">Masukkan Status Pengguna</div>
        </div>
        <div class="mb-3">
            <span class="text-danger">Catatan: Username Pengguna Digunakan Ketika Pengguna Akan Melakukan Login, dan
                Password Default Adalah: <strong class="text-dark text-decoration-underline">password</strong>. Minta
                Pengguna Untuk
                Mengganti
                <strong>Password</strong> - nya Melalui
                Menu Edit Profil Setelah Login.</span>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection