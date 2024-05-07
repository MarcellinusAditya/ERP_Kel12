@extends('inventaris.layout.appinventaris')

@section('content')

<div class="card col-md-8 mx-auto">
    <div class="card-body">
        <h5 class="card-title">Form Edit Barang</h5>

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

        <form class="row g-2" method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
          @method('put')
            @csrf
            <div class="col-md-12">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="name" value="{{$product->name}}">
                @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-5">
                <label for="harga_awal" class="form-label">Harga Awal</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest Rupiah)" name="initial_price" value="{{$product->initial_price}}">
                    @error('initial_price')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
                    <span class="input-group-text">.00</span>
                </div>
            </div>

            <div class="col-md-5">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest Rupiah)"
                        name="selling_price" value="{{$product->selling_price}}">
                        @error('selling_price')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
                    <span class="input-group-text">.00</span>
                </div>
            </div>

            

            <div class="col-12">
                <label for="inputState" class="form-label">Jenis Barang</label>
                <select id="inputState" class="form-select" name="category">
                  <option  selected="selected" hidden>{{$product->category}}</option>  
                    <option>Makanan</option>
                    <option>Minuman</option>
                    <option>Alat</option>
                </select>
                @error('category')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="barcode" class="form-label">Barcode</label>
                <input type="text" class="form-control" id="barcode" placeholder="unique numbers" name="barcode" value="{{$product->barcode}}">
                @error('barcode')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
            
            <div class="col-12">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="image" value="{{$product->image}}">
                <p>Current image : {{ $product->image }}</p>
                @error('foto')
              <div classs="invalid-feedback">
                {{$message}}
              </div>
              @enderror
                
            </div>

            <div class="col-12">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control" style="height: 100px" name="description">{{$product->description}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                  {{$message}}
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
