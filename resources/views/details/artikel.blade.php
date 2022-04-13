@extends('layouts.master')

@section('content')
<section class="page-section bg-light" id="team">
    <div class="container">

        <section class="page-section" id="about">
            <div class="container">

                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>{{ $data->title }}</h4>
                        <p class="subheading">
                            diunggah {{ $data->created_at->format('D M Y, H:i') }}
                        </p>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            {{ $data->desc }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>
@endsection
