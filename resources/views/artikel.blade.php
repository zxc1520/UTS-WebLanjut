@extends('layouts.master')

@section('content')
<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">

        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Artikel</h2>
                </div>
                <ul>
                    @foreach ($dataArtikel as $d)
                    <li>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><a href="/artikel/{{ $d->id }}">{{ $d->title }}</a></h4>
                                <p class="subheading">
                                    diunggah {{ $d->created_at->format('D M Y, H:i') }}
                                </p>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    {{ $d->desc }}
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>

    </div>
</section>
@endsection
