@extends('layouts.main')

@section('content')

<h1>
    Tentang
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="update-data col-lg-12">
    <a href="/tentang/edit" class="btn btn-primary">
        <i class="bi bi-cloud-plus"></i>
        Ubah Data
    </a>
</div>

<div role="main-content">
    <h3>SMAN 8 Kota Bengkulu</h3>
    <p>Instansi</p>

    <table class="table">
        <tbody class="table-group-divider">
            <tr>
                <td>Kabupaten/Kota</td>
                <td>Bengkulu</td>
            </tr>
            <tr>
                <td>No Telpon</td>
                <td>{{ $about->telephone_number }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $about->email }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ $about->address }}</td>
            </tr>
            <tr>
                <td>Kepala Sekolah</td>
                <td>{{ $about->head_master }}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>{{ $about->nip }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection