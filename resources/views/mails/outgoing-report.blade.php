@extends('layouts.main')

@section('content')

<h1>
    Laporan Pengarsipan Surat Keluar
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="print-data col-lg-12">
    <a href="/surat-keluar/print" target="_blank" class="btn btn-primary">
        <i class="bi bi-printer"></i>
        Print
    </a>
</div>

<div role="main-content">
    <div class="aksi">
        <form class="aksi d-flex justify-content-between align-items-center mb-4 gap-3">
            <label for="date" class="form-label text-nowrap">Filter Tanggal</label>
            <input type="date" class="form-control" id="date">
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>Sifat Surat</th>
                <th>Kategori Surat</th>
                <th>Tujuan Surat</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td>1</td>
                <td>13-10-2021</td>
                <td>DPU/2020</td>
                <td>Undangan Lomba</td>
                <td>Penting</td>
                <td>Surat Undangan</td>
                <td>SMAN 5 Bengkulu</td>
            </tr>
            <tr>
                <td>2</td>
                <td>13-10-2021</td>
                <td>DPU/2020</td>
                <td>Undangan Kegiatan</td>
                <td>Penting</td>
                <td>Surat Undangan</td>
                <td>SMAN 10 Bengkulu</td>
            </tr>
            <tr>
                <td>3</td>
                <td>13-10-2021</td>
                <td>DPU/2020</td>
                <td>Undangan Pertemuan</td>
                <td>Penting</td>
                <td>Surat Undangan</td>
                <td>SMAN 2 Bengkulu</td>
            </tr>
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