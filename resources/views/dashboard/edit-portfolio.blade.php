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
                            <form action="/portfolio/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control @error('title')
                                        is-invalid
                                    @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ $data->title }}">
                                    @error('title')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="select">Type</label>
                                    <select class="form-control @error('type')
                                        is-invalid
                                    @enderror" name="type" id="select">
                                        <option selected">{{ $data->type }}</option>
                                        <option value="Mobile App">Mobile App</option>
                                        <option value="Web Apps">Web Apps</option>
                                        <option value="IoT">IoT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Author</label>
                                    <input type="text" name="author" class="form-control @error('author')
                                        is-invalid
                                    @enderror" id="exampleInputPassword1" placeholder="Enter Author" value="{{ $data->author }}">
                                    @error('author')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="floatingTextarea2">Description</label>
                                    <textarea class="form-control @error('desc')
                                        is-invalid
                                    @enderror" name="desc" placeholder="Enter description here" id="floatingTextarea2" style="height: 100px" ">{{ $data->desc }}</textarea>
                                    @error('desc')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <button type=" submit" class="btn btn-primary">Submit</button>
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
