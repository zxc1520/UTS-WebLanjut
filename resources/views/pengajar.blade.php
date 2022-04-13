@extends('layouts.master')

@section('content')
<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">
                Our Amazing Mentor
            </h2>
            <h3 class="section-subheading text-muted">
                We are passionate!
            </h3>
        </div>
        <div class="row">
            @foreach ($data as $d)
            <div class="col-lg-4">
                <div class="team-member">
                    <h4>{{ $d->nama }}</h4>
                    <p class="text-muted">{{ $d->jabatan }}</p>
                    <p class="text-muted">{{ $d->kontak }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
