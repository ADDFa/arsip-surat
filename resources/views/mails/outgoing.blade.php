@extends('layouts.main')

@section('content')

<h1>
    Data Surat Keluar
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="add-data col-lg-12">
    <a href="/surat-keluar/create" class="btn btn-primary">
        <i class="bi bi-cloud-plus"></i>
        Tambah Surat Keluar
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
            <input type="text" data-table="outgoing_mails" class="form-control"
                placeholder="Cari Berdasarkan Nomor Surat">
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Sifat Surat</th>
                <th>Tujuan Surat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            @foreach ($mails as $mail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mail->mail_number }}</td>
                <td>{{ $mail->mail_nature }}</td>
                <td>{{ $mail->mail_destination }}</td>
                <td class="action">
                    <a href="/surat-keluar/{{ $mail->id }}" class="btn btn-success">
                        <i class="bi bi-info-circle"></i>
                    </a>
                    <a href="/surat-keluar/{{ $mail->id }}/edit" class="btn btn-info">
                        <i class="bi bi-pen"></i>
                    </a>

                    <form action="/surat-keluar/{{ $mail->id }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button type="button" class="btn btn-danger delete">
                            <i class="bi bi-trash delete"></i>
                        </button>
                        <button hidden type="submit"></button>
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