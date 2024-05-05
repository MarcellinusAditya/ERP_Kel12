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
        @for ($i = 0; $i < 10; $i++)
        <!-- Card Barang -->
        <div class="col-xl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Opsi</h6>
                </li>
                <li><a class="dropdown-item" href="#">Edit</a></li>
                <li><a class="dropdown-item" href="#">Hapus</a></li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Pizza</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg/640px-Eq_it-na_pizza-margherita_sep2005_sml.jpg" alt="" width="100" height="100" style="border: 1px  black; border-radius: 50px; padding: 15px;">
                </div>
                <div class="ps-3">
                  <h6>5</h6>
                  <span class="text-success small pt-1 fw-bold">Masuk : 12/06/2023</span> <br>
                  <span class="text-danger small pt-1 fw-bold">Keluar : 18/06/2023</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Card Barang -->
        @endfor
      </div><!-- End inner row -->
    </div><!-- End Left side columns -->
  </div><!-- End row -->
</section><!-- End section -->

@endsection
