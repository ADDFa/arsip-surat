@extends('layouts.main')

@section('content')

<h1>
    About
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="update-data col-lg-12">
    <a href="" class="btn btn-primary">
        <i class="bi bi-cloud-plus"></i>
        Ubah Data
    </a>
</div>

<div role="main-content">
    <h3>SMAN 8 Kota Bengkulu</h3>
    <p>Instansi</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Kabupaten/Kota</th>
                <th scope="col">Bengkulu</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <tr>
                <td scope="row">No Telpon</td>
                <td>0736-7310228</td>
            </tr>
            <tr>
                <td scope="row">Email</td>
                <td>smandelbengkulu@gmail.com</td>
            </tr>
            <tr>
                <td scope="row">Alamat</td>
                <td>Jln. WR Supratman, No.18 Rt.007, Pematang Gubernur, Kecamatan Muara Bangkahulu</td>
            </tr>
            <tr>
                <td scope="row">Kepala Sekolah</td>
                <td>Hidayatul Mardiah</td>
            </tr>
            <tr>
                <td scope="row">NIP</td>
                <td>1771074110790001</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection