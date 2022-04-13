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
                            Form - Portfolio
                        </div>
                        <div class="card-body">
                            <form action="/portfolio" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control @error('title')
                                        is-invalid
                                    @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" value="{{old('title')}}">
                                    @error('title')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="select">Type</label>
                                    <select class="form-control" name="type" id="select">
                                        <option value="Mobile App">Mobile Apps</option>
                                        <option value="Web App">Web Apps</option>
                                        <option value="IoT">IoT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Author</label>
                                    <input type="text" name="author" class="form-control @error('author')
                                        is-invalid
                                    @enderror" id="exampleInputPassword1" placeholder="Enter Author" value="{{ old('author') }}">
                                    @error('author')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="floatingTextarea2">Description</label>
                                    <textarea class="form-control @error('desc')
                                        is-invalid
                                    @enderror" name="desc" placeholder="Enter description here" id="floatingTextarea2" style="height: 100px">{{ old('desc') }}</textarea>
                                    @error('desc')
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
