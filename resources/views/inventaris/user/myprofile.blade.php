@extends('inventaris.layout.appinventaris')

@section('content')

<div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            @if(isset($user->foto))
                        <img src="{{ asset('foto/profile/' . $user->foto) }}" alt="Admin" class="rounded-circle" >
                         @else
                        <p>No photo available</p>
                         @endif
              <h2>{{$user->name}}</h2>
              <h3>{{$user->email}}</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li> -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-9 col-md-8">{{$user->tanggal_lahir ?? 'none'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-9 col-md-8">{{$user->jenis_kelamin ?? 'none'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jabatan</div>
                    <div class="col-lg-9 col-md-8">{{$user->jabatan ?? 'none'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8">{{$user->alamat ?? 'none'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{$user->no_telepon ?? 'none'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{url('/user/myprofile/'.$user->id)}}" enctype="multipart/form-data">
                  @method('PATCH')
                  @csrf

                  
                  <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="{{$user->email}}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                      @if(isset($user->foto))
                        <img src="{{ asset('foto/profile/' . $user->foto) }}" alt="Admin" class="rounded-circle ">
                         @else
                        <p>No photo available</p>
                         @endif
                        <div class="pt-2">
                        <div class="col-sm-10">
                            <input class="form-control" name="foto" type="file" id="formFile">
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{$user->name}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">tanggal lahir</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" value="{{$user->tanggal_lahir}}">
                      </div>
                    </div>

                    <fieldset class="row mb-3">
                    <label for="Jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-5">
                    <div class="form-check">
                      <input class="form-check-input" name="jenis_kelamin" type="radio" name="gridRadios" id="gridRadios1" value="Laki-Laki" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Laki-Laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="jenis_kelamin" type="radio" name="gridRadios" id="gridRadios2" value="Perempuan">
                      <label class="form-check-label" for="gridRadios2">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </fieldset>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="jabatan" type="text" class="form-control" id="Job" value="{{$user->jabatan}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="alamat" type="text" class="form-control" id="Address" value="{{$user->alamat}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_telepon" type="text" class="form-control" id="Phone" value="{{$user->no_telepon}}">
                      </div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                                        {{__('Update Profile')}}
                    </button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="{{url('/user/myprofile/password/'.$user->id)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" 
                                name="old_password">
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>


@endsection