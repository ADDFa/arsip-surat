@extends('layouts.main')

@section('content')
<h1>
    Data Surat Keluar
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="add-data col-lg-12">
    <a href="" class="btn btn-primary">
        <i class="bi bi-cloud-plus"></i>
        Tambah Surat Keluar
    </a>
</div>

<div role="main-content">
    <div class="aksi">
        <div class="dropdown">
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

        <form class="search">
            <input type="text">
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Sifat Surat</th>
                <th>Kategori Surat</th>
                <th>Tujuan Surat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            @for ($i = 1; $i < 5; $i++) <tr>
                <td>{{ $i }}</td>
                <td>13-08-2021</td>
                <td>DPU/2020</td>
                <td>Penting</td>
                <td>Surat Undangan</td>
                <td>SMAN 5 Bengkulu</td>
                <td class="action">
                    <a href="" class="btn btn-success">
                        <i class="bi bi-info-circle"></i>
                    </a>
                    <a href="" class="btn btn-info">
                        <i class="bi bi-pen"></i>
                    </a>

                    <form action="">
                        <button class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
                </tr>
                @endfor
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