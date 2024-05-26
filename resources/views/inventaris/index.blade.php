@extends('inventaris.layout.appinventaris')

@section('content')

<div class="pagetitle">
  <h1> Inventaris</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <!-- <li class="breadcrumb-item">Pages</li> -->
      <li class="breadcrumb-item active">Inventaris</li>
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
    <a href="{{url('/tabel')}}" class="card-link">
        <div class="alert alert-warning alert-dismissible fade show">
            <div class="card-body">
                <h5 class="card-title">Ubah Tampilan Dalam Bentuk Tabel</h5>
                <p>Anda Akan Mengubah Bentuk Tabel</p>
            </div>
        </div>
    </a>
</div>
  </div>


</section>




<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        @foreach ($product as $p)
          
        
        <!-- Card Barang -->
        <div class="col-xl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="filter">
              <a class="icon " href="#" role="button type="button" class="btn btn-danger"" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Opsi</h6>
                </li>
                <li><a class="dropdown-item" href="{{ route('product.edit', $p->id)}}">Edit</a></li>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#disablebackdrop_{{ $p->id }}">
                  Hapus
              </button>
              </ul>
              <!-- modal hapus -->
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

            </div>
            <div class="card-body">
              <h5 class="card-title">{{$p->name}}</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <img src="{{url('foto/img')}}/{{$p->image}}" alt="" width="100" height="100" style="border: 1px  black; border-radius: 50px; padding: 15px;">
                </div>
                <div class="ps-3">
                  <h6>Stock: {{$p->stock}}</h6>
                  <a href="{{ route('logs.create', [$p->id, 'status'=>'Out'])}}"><button type="button" class="btn btn-danger"><i class="fas fa-minus"></i></button ></a>
                  <a href="{{ route('logs.create', [$p->id,'status'=>'In'])}}"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button></a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Card Barang -->
        @endforeach
      </div><!-- End inner row -->
    </div><!-- End Left side columns -->
  </div><!-- End row -->
</section><!-- End section -->

@endsection
