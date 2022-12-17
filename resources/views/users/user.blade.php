@extends('layouts.main')

@section('content')

<h1>
    Data Pengguna
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="add-data col-lg-12">
    <a href="/pengguna/create" class="btn btn-primary">
        <i class="bi bi-person-plus"></i>
        Tambah Pengguna
    </a>
</div>

<div role="main-content">
    <div class="aksi d-flex justify-content-between align-items-center mb-4">
        <div class="dropdown col-lg-8">
            <span>Tampilkan</span>

            <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                3
            </a>

            <span>Data</span>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">1</a></li>
                <li><a class="dropdown-item" href="#">2</a></li>
                <li><a class="dropdown-item" href="#">3</a></li>
            </ul>
        </div>

        <form class="search position-relative col-lg-4">
            <input type="text" class="form-control" placeholder="Search...">
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->credential->email }}</td>
                <td class="text-capitalize">{{ $user->role }}</td>
                <td class="action">
                    <a href="/pengguna/{{ $user->id }}" class="btn btn-success">
                        <i class="bi bi-info-circle"></i>
                    </a>

                    <form action="/pengguna/{{ $user->id }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="info">
        <p>Menampilkan Data 1 Sampai 3 dari 3 Data</p>

        <div>
            <button>Sebelumnya</button>
            <button>1</button>
            <button>Selanjutnya</button>
        </div>
    </div>
</div>

@endsection