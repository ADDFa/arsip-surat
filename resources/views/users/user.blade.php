@extends('layouts.main')

@section('content')

<h1>
    Data Pengguna
    <p> Sistem Informasi Pengarsipan Surat</p>
</h1>

<a href=""></a>

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
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td>1</td>
                <td>caturrrr</td>
                <td>Faridho Catur Pamungkas</td>
                <td>faridhoc@gmail.com</td>
                <td>photo.jpg</td>
                <td>Admin</td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>andriyan</td>
                <td>Andriyansyah</td>
                <td>Andriyansyah@gmail.com</td>
                <td>12345.jpg</td>
                <td>User</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Adhaa</td>
                <td>Adha Dont Differatama</td>
                <td>adhadond@gmail.com</td>
                <td>foto.jpg</td>
                <td>User</td>
                <td></td>
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