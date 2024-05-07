@extends('inventaris.layout.appinventaris')

@section('content')

<div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
  <div class="row">
  <div class="col-lg-4" >
    <a href="{{url('/create')}}" class="card-link">
        <div class="alert alert-success alert-dismissible fade show">
            <div class="card-body">
                <h5 class="card-title">Tambah Barang</h5>
                <p>Anda Dapat Menambahkan barang untuk masuk kedalam sistem inventaris</p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-4 " >
    <a href="{{ route('index') }}" class="card-link">
        <div class="alert alert-warning alert-dismissible fade show">
            <div class="card-body">
                <h5 class="card-title">Ubah Tampilan</h5>
                <p>Anda Akan Mengubah Bentuk Tabel</p>
            </div>
        </div>
    </a>
</div>
  </div>


</section>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah Barang</th>
                    <th data-type="date" data-format="DD/MM/YYYY">Tanggal Masuk</th>
                    <th data-type="date" data-format="DD/MM/YYYY">Tanggal Keluar</th>
                    <th>Gambar</th>
                    <th>harga awal</th>
                    <th>harga jual</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($product as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->category}}</td>
                    <td>{{$p->stock}}</td>
                    <td>29/03/2024</td>
                    <td>01/04/2024</td>
                    <td><img src="{{url('foto/img')}}/{{$p->image}}" width="50px" alt=""></td>
                    <td>{{$p->initial_price}}</td>
                    <td>{{$p->selling_price}}</td>
                    <td> 
                      <a href="{{ url('/Inventaris')}}"><button type="button" class="btn btn-success">Edit Stock <i class="fas fa-plus"></i></button>
                        <a href="{{ route('product.edit', $p->id)}}"><button type="button" class="btn btn-secondary">Edit <i class="fas fa-pen"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#disablebackdrop_{{ $p->id }}"> Hapus <i class="fa-solid fa-trash"></i></button>

                        <div class="modal fade" id="disablebackdrop_{{ $p->id }}" tabindex="-1" data-bs-backdrop="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Anda yakin menghapus barang ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ url('/destroy/'.$p->id) }}"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Disabled Backdrop Modal-->

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