@extends('inventaris.layout.appinventaris')

@section('content')

<div class="card col-md-8 mx-auto">
            <div class="card-body ">
              <h5 class="card-title">Form Menambahkan Barang</h5>

              <!-- Multi Columns Form -->
              <form class="row g-2">
                <div class="col-md-12">
                  <label for="nama_barang" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama_barang" name="">
                </div>
                
                <div class="col-md-5">
                <label for="harga_awal" class="form-label">Harga Awal</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest Rupiah)" name="">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>

                <div class="col-md-5">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest Rupiah)" name="">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>

                <div class="col-md-2">
                <label for="nama_barang" class="form-label">Jumlah Barang</label>
                  <input type="number" class="form-control" id="nama_barang" name="">
                </div>

                <div class="col-12">
                  <label for="inputState" class="form-label">Jenis Barang</label>
                  <select id="inputState" class="form-select" name="">
                    <option>Makanan</option>
                    <option>Minuman</option>
                    <option>Alat</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="Barcode" class="form-label">Barcode</label>
                  <input type="text" class="form-control" id="Barcode" placeholder="unique numbers" name="">
                </div>

                <div class="col-12">
                  <label for="Foto" class="form-label">Foto</label>
                  <input type="file" class="form-control" >
                </div>

                <div class="col-12">
                  <label for="catatan" class="form-label">Catatan</label>
                  <textarea class="form-control" style="height: 100px"></textarea>
                </div>
                
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

@endsection