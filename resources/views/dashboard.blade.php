@extends('layouts.main')

@section('content')
<h1>
    Dashboard
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<div role="dashboard-content" class="row col-lg-12 mb-5">
    <div class="col-lg-3 mb-3">
        <a href="/pengguna">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengguna</h5>
                    <p class="card-text">{{ $amount->user }}</p>
                    <hr>
                    <p class="text-end">Total User</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 mb-3">
        <a href="/disposisi">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Disposisi</h5>
                    <p class="card-text">{{ $amount->disposition }}</p>
                    <hr>
                    <p class="text-end">Total Riwayat Disposisi</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 mb-3">
        <a href="/surat-masuk">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Surat Masuk</h5>
                    <p class="card-text">{{ $amount->incoming }}</p>
                    <hr>
                    <p class="text-end">Total Surat</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 mb-3">
        <a href="/surat-keluar">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Surat Keluar</h5>
                    <p class="card-text">{{ $amount->outgoing }}</p>
                    <hr>
                    <p class="text-end">Total Surat</p>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-5 mails-today">
        <h4>Surat yang masuk dan keluar hari ini</h4>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Surat</th>
                    <th scope="col">Kategori Surat</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($mailsToday as $mailToday)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $mailToday->mail_nature }}</td>
                    <td>{{ $mailToday->mail_category }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-lg-7">
        <div id="chart_div"></div>
    </div>
</div>

@endsection