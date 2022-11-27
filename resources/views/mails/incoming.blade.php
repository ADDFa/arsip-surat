@extends('layouts.main')

@section('content')
<h1>
    Data Surat Masuk
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

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
                <th>Sifat Surat</th>
                <th>Kategori Surat</th>
                <th>Pengirim</th>
                <th>Disposisi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>13-08-2021</td>
                <td>DPU/2020</td>
                <td>Penting</td>
                <td>Surat Undangan</td>
                <td>SMAN 5 Bengkulu</td>
                <td></td>
                <td>
                    <a href="">Detail</a>
                    <a href="">Ubah</a>

                    <form action="">
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>13-10-2021</td>
                <td>DPU/2020</td>
                <td>Penting</td>
                <td>Surat Undangan</td>
                <td>SMAN 10 Bengkulu</td>
                <td></td>
                <td>
                    <a href="">Detail</a>
                    <a href="">Ubah</a>

                    <form action="">
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>13-12-2021</td>
                <td>DPU/2020</td>
                <td>Penting</td>
                <td>Surat Undangan</td>
                <td>SMAN 2 Bengkulu</td>
                <td></td>
                <td>
                    <a href="">Detail</a>
                    <a href="">Ubah</a>

                    <form action="">
                        <button>Hapus</button>
                    </form>
                </td>
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