@extends('layouts.main')

@section('content')
<h1>
    Data Surat Masuk
    <p>Sistem Informasi Pengarsipan Surat</p>
</h1>

<div class="add-data col-lg-12">
    <a href="/surat-masuk/create" class="btn btn-primary">
        <i class="bi bi-cloud-plus"></i>
        Tambah Surat Masuk
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

    <table class="table incoming-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Sifat Surat</th>
                <th>Pengirim</th>
                <th class="text-center">Disposisi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            @foreach ($mails as $mail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mail->mail_number }}</td>
                <td>{{ $mail->mail_nature }}</td>
                <td>{{ $mail->sender }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-warning btn-disposition" data-bs-toggle="modal"
                        data-bs-target="#dispositionModal" data-regardingMail="{{ $mail->regarding_mail }}"
                        data-mailId="{{ $mail->id }}">
                        <i class="bi bi-send btn-disposition" data-regardingMail="{{ $mail->regarding_mail }}"
                            data-mailId="{{ $mail->id }}"></i>
                    </button>
                </td>
                <td class="action">
                    <a href="" class="btn btn-success">
                        <i class="bi bi-info-circle"></i>
                    </a>
                    <a href="/surat-masuk/{{ $mail->id }}/edit" class="btn btn-info">
                        <i class="bi bi-pen"></i>
                    </a>

                    <form action="/surat-masuk/{{ $mail->id }}" method="POST">
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

<div class="modal fade disposition" id="dispositionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title  fs-6" id="exampleModalLabel">
                    <span>Disposisi</span>
                    <span>Disposisi ....</span>
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="userId" value="{{ session('user')->id }}">
                    <input type="hidden" name="incomingMailId">

                    <div class="mb-3">
                        <label for="regardingMail" class="form-label">Perihal</label>
                        <input type="hidden" id="regardingMail" name="regardingMail" value="Surat Undangan">
                        <input type="text" class="form-control regardingMailInput" value="Surat Undangan" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="fromUnit" class="form-label">Dari Bagian</label>
                        <input type="hidden" id="fromUnit" name="fromUnit" value="{{ session('user')->role }}">
                        <input type="text" class="form-control" value="{{ session('user')->role }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="dispositionDestination" class="form-label">Disposisi Kepada</label>
                        <input type="text" class="form-control" id="dispositionDestination"
                            name="dispositionDestination">
                    </div>

                    <div class="mb-3">
                        <label for="dispositionContent" class="form-label">Isi Disposisi</label>
                        <textarea class="form-control" id="dispositionContent" name="dispositionContent"
                            rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-primary btn-save-disposition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection