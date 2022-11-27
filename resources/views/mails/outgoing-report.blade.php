@extends('layouts.main')

@section('content')

<h1>
   Laporan Pengarsipan Surat Keluar
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<button>Print</button>

<div role="main-content">
    <div class="aksi">
        <div class="dropdown">
            <span>Show</span>

            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                3
            </a>

            <span>Entries</span>

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

    <table>
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
        <tbody>
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
        <p>Showing 1 to 3 Of 3 Entries</p>

        <div>
            <button>Sebelumnya</button>
            <button>1</button>
            <button>Selanjutnya</button>
        </div>
    </div>
</div>

@endsection