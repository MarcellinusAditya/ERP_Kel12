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
    <a href="{{ route('tambah') }}" class="card-link">
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
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th data-type="date" data-format="DD/MM/YYYY">Tanggal Masuk</th>
                    <th data-type="date" data-format="DD/MM/YYYY">Tanggal Keluar</th>
                    <th>Tempat Penyimpanan</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < 10; $i++)
                  <tr>
                    <td>Pizza</td>
                    <td>5</td>
                    <td>29/03/2024</td>
                    <td>01/04/2024</td>
                    <td>Restoran A</td>
                    <td> 
                        <a href="#"><button type="button" class="btn btn-secondary">Edit <i class="fas fa-pen"></i></button>
                        <a href="#"><button type="button" class="btn btn-danger">Hapus <i class="fa-solid fa-trash"></i></button>
                    
                    </td>
                  </tr>
                  
                  <tr>
                    <td>Donat</td>
                    <td>7</td>
                    <td>25/03/2024</td>
                    <td>05/04/2024</td>
                    <td>Restoran B</td>
                    <td> 
                    <a href="#"><button type="button" class="btn btn-secondary">Edit <i class="fas fa-pen"></i></button>
                    <a href="#"><button type="button" class="btn btn-danger">Hapus <i class="fa-solid fa-trash"></i></button>
                     </td>

                  </tr>
                  @endfor
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection