@extends('inventaris.layout.appinventaris')

@section('content')

<div class="pagetitle">
    <h1>Data Tabel Supplier</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Supplier</h5>

                    <!-- Button to add supplier -->
                    <div class="mb-3">
                        <a href="{{ route('supplier.create') }}" class="btn btn-success">Tambah Supplier</a>
                    </div>

                    <!-- Display status message -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                function formatPhoneNumber($number)
                                {
                                    // Cek apakah karakter pertama adalah '0'
                                    if (strpos($number, '0') === 0) {
                                        // Ganti '0' dengan '62' dan kembalikan sisa string
                                        return '62' . substr($number, 1);
                                    }
                                    // Jika tidak dimulai dengan '0', kembalikan nomor aslinya
                                    return $number;
                                }
                            @endphp

                            @foreach ($supplier as $s)
                                <tr>
                                    <td>{{ $s->id }}</td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->alamat }}</td>
                                    <td>{{ $s->email }}</td>
                                    <td>
                                        {{ $s->no_telepon }}
                                        <a href="https://wa.me/{{ formatPhoneNumber($s->no_telepon) }}" class="btn btn-success" target="blank">Chat via WhatsApp</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('supplier.edit', $s->id) }}" class="btn btn-warning">Edit</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $s->id }}">Hapus</button>

                                        <!-- Modal hapus -->
                                        <div class="modal fade" id="deleteModal_{{ $s->id }}" tabindex="-1" aria-labelledby="deleteModalLabel_{{ $s->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel_{{ $s->id }}">Hapus Supplier</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus supplier ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <a href="{{ url('/supplier/hapus/'.$s->id) }}"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal hapus -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
