@extends('inventaris.layout.appinventaris')

@section('content')

<div class="pagetitle">
      <h1>Data Logs Barang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Logs</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
  


</section>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Logs Barang</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Admin</th>
                    <th>Nama Barang</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Jumlah Akhir</th>
                    <th>Supplier</th>
                    <th data-type="date" data-format="DD/MM/YYYY">Tanggal Input</th>
                    <th>Nota</th>
                    <th>Keterangan</th>

                  </tr>
                </thead>
                <tbody>
                @foreach ($logs as $log)
                  <tr>
                    <td>{{$log->id}}</td>
                    <td>{{$log->user->name ?? ''}}</td>
                    <td>{{$log->product->name}}</td>
                    @if ($log->status=='In')
                    <td class="text-success">Tambah</td>
                    @endif
                    @if ($log->status=='Out')
                    <td class="text-danger">Kurang</td>
                    @endif
                   
                    <td>{{$log->stock}}</td>
                    <td>{{$log->final_stock}}</td>
                    <th>{{$log->supplier->name ?? ''}}</th>
                    <td>{{$log->created_at}}</td>
                    <td>{{$log->nota}}</td>
                    <td>{{$log->description}}</td>

                    
                    
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