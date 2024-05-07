@extends('inventaris.layout.appinventaris')

@section('content')

<div class="card col-md-8 mx-auto">
    <div class="card-body">
        <h5 class="card-title">Form Ubah Stock Barang</h5>
        <h5>Perubahan stock barang akan tercatat pada logs</h5><br>
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

        <form class="row g-2" method="POST" action="{{route('logs.store',$product->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="name" value="{{$product->name}}" disabled>
                @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-8">
                <label for="status_stock" class="form-label">Status</label>
                <div class="btn-group form-control" role="group" id="status_stock" aria-label="Basic radio toggle button group">
                    @if ($status =='Out')
                    <input type="radio" class="btn-check " name="status" id="btnradio1" value="Out" autocomplete="off" checked>
                    <label class="btn btn-outline-danger" for="btnradio1">Kurang</label>
                  
                    <input type="radio" class="btn-check" name="status" id="btnradio2" value="In" autocomplete="off">
                    <label class="btn btn-outline-success" for="btnradio2">Tambah</label>
                    @endif

                    @if ($status =='In')
                    <input type="radio" class="btn-check " name="status" id="btnradio1" value="Out" autocomplete="off" >
                    <label class="btn btn-outline-danger" for="btnradio1">Kurang</label>
                  
                    <input type="radio" class="btn-check" name="status" id="btnradio2" autocomplete="off" value="In" checked>
                    <label class="btn btn-outline-success" for="btnradio2">Tambah</label>
                    @endif
                  
                    
                  </div>
            </div>

            
            <div class="col-md-4">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah_barang" name="stock">
                @error('stock')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            

            <div class="col-12">
                <label for="barcode" class="form-label">Nota</label>
                <input type="text" class="form-control" id="barcode" placeholder="unique numbers" name="nota">
                @error('barcode')
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
