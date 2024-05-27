@extends('inventaris.layout.appinventaris')

@section('content')

<div class="card col-md-8 mx-auto">
    <div class="card-body">
        <h5 class="card-title">Form Menambahkan Supplier</h5>

        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <!-- Multi Columns Form -->

        <form class="row g-2" method="POST" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="nama_supplier" class="form-label">Nama supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="name">
                @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea class="form-control" style="height: 100px" name="alamat"></textarea>
                @error('alamat')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>


            <div class="col-6">
                <label for="no_telepon" class="form-label">No Telepoon</label>
                <input type="text" class="form-control" id="no_telepon" placeholder="contoh : 08123456789" name="no_telepon">
                @error('no_telepon')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="contoh : comppany@gmail.com" name="email">
                @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            

            <div class="text-center">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>

@endsection
