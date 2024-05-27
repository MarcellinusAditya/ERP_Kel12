@extends('inventaris.layout.appinventaris')

@section('content')

<div class="card col-md-8 mx-auto">
    <div class="card-body">
        <h5 class="card-title">Form Edit Supplier</h5>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Multi Columns Form -->

        <form class="row g-3" method="POST" action="{{ route('supplier.update', $supplier->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-md-12">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama_supplier" name="name" value="{{ old('name', $supplier->name) }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" style="height: 100px" name="alamat">{{ old('alamat', $supplier->alamat) }}</textarea>
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-6">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" placeholder="contoh : 08123456789" name="no_telepon" value="{{ old('no_telepon', $supplier->no_telepon) }}">
                @error('no_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="contoh : company@gmail.com" name="email" value="{{ old('email', $supplier->email) }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="text-center">
                <button name="submit" type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>

@endsection
