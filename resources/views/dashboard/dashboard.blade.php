@extends('dashboard.layouts.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('dashboard.partials.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            @if(session()->has('storeSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congrats !</strong> {{ session('storeSuccess') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something Went Wrong !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Hai ! Selamat Datang</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ auth()->user()->name }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Posts</h1>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Portfolio</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Dibuat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <th>{{ $d->title }}</th>
                                        <td>{{ $d->type }}</td>
                                        <td>{{ $d->author }}</td>
                                        <td>{{ $d->desc }}</td>
                                        <td>{{ $d->created_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger delete" data-id="{{ $d->id }}">Hapus</a>
                                            <a href="/portfolio/show/{{$d->id}}" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <a href="/portfolio">Add more portfolio &rArr;</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengajar</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kontak</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPengajar as $d)
                                    <tr>
                                        <th>{{ $d->nama }}</th>
                                        <td>{{ $d->jabatan }}</td>
                                        <td>{{ $d->alamat }}</td>
                                        <td>{{ $d->kontak }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger delete-pengajar" data-id="{{$d->id}}">Hapus</a>
                                            <a href="/pengajar/show/{{$d->id}}" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <a href="/pengajardash">Add more pengajar &rArr;</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Posted</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataArtikel as $d)
                                    <tr>
                                        <th>{{ $d->title }}</th>
                                        <td>{{ $d->desc }}</td>
                                        <td>{{ $d->created_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger delete-artikel" data-id="{{$d->id}}">Hapus</a>
                                            <a href="/artikel/show/{{$d->id}}" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <a href="/artikeldash">Add more artikel &rArr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    @include('dashboard.partials.footer')

    @include('sweetalert::alert')

</div>
@endsection
