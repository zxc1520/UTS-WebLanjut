@extends('dashboard.layouts.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        @include('dashboard.partials.topbar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow-4">
                        <div class="card-header py3">
                            Form
                        </div>
                        <div class="card-body">
                            <form action="/pengajar/edit/{{ $data->id }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama')
                                        is-invalid
                                    @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{ $data->nama }}">
                                    @error('nama')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="select">Jabatan</label>
                                    <select class="form-control @error('type')
                                        is-invalid
                                    @enderror" name="type" id="select">
                                        <option selected>{{ $data->jabatan }}</option>
                                        <option value="Kepala Program Keahlian">Kaprogli</option>
                                        <option value="Asisten">Asisten</option>
                                        <option value="Produktif RPL">Produktif RPL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <input type="text" name="alamat" class="form-control @error('alamat')
                                        is-invalid
                                    @enderror" id="exampleInputPassword1" placeholder="Enter Alamat" value="{{ $data->alamat }}">
                                    @error('alamat')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kontak</label>
                                    <input type="text" name="kontak" class="form-control @error('kontak')
                                        is-invalid
                                    @enderror" id="exampleInputPassword1" placeholder="Enter Kontak" value="{{ $data->kontak }}">
                                    @error('kontak')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('dashboard.partials.footer')
</div>
@endsection
