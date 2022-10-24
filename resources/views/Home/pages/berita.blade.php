@extends('Home.layouts.layouthome')

@section('section')
    @php
    setlocale(LC_TIME, 'id');
    @endphp
    <section class="py-3" id="berita">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Berita</h2>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-8">
                    <div class="row">
                        @foreach ($news as $item)
                            <div class="col-lg-6 col-sm-3 mx-">
                                <div class="card card-plain">
                                    <div class="card-header p-0 position-relative">
                                        <a class="d-block blur-shadow-image" href="{{ url('/news/' . $item->slug) }}">
                                            @php
                                                $thumbnailBerita = explode("|", $item->thumbnail);
                                            @endphp
                                            <img src="{{ asset('/storage/uploads/berita/' . $thumbnailBerita[0]) }}"
                                                alt="img-blur-shadow" class="img img-thumbnail" loading="lazy"
                                                style="width: 100%; height: 15vw; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="card-body px-0">
                                        <h5 style="min-height: 110px">
                                            <a href="{{ url('/news/' . $item->slug) }}"
                                                class="text-dark font-weight-bold">{{ $item->subject }}</a>
                                        </h5>
                                        <p>
                                            {!! substr_replace($item->description, '...', 90) !!}
                                        </p>
                                        <p style="font-size: 12px; font-weight:bold;">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                                            {{ $item->created_at->formatLocalized('%d %B %Y, %H:%M:%S') }}
                                        </p>
                                        <a href="{{ url('/news/' . $item->slug) }}"
                                            class="text-info text-sm icon-move-right">Read
                                            More
                                            <i class="fas fa-arrow-right text-xs ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $news->links() }}
                    </div>
                </div>
                <!--sidebar -->
                <div class="col-md-4">
                    <div class="position-sticky" style="top: 8rem;">
                        <div class="p-4">
                            <h4 class="fst-italic">Kategori Berita</h4>
                            <ol class="list-unstyled mb-0">
                                @foreach ($news_categories as $item)
                                    <li class="nav-item mb-3" style="border-bottom: 1px solid black">
                                        <a class="nav-link text-dark" href="{{ url('/news/category/' . $item->slug) }}">
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;
                                            {{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                        <div class="p-4">
                            <h4 class="fst-italic">Berita Terkini</h4>
                            <ol class="list-unstyled">
                                @foreach ($latest_news as $new)
                                    <li class="mb-3 " style="list-style: none;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="post-image">
                                                    <div class="logo img ">
                                                        <a href="{{ url('/news/' . $new->slug) }}">
                                                            @php
                                                                $thumbnailLastBerita = explode("|", $new->thumbnail);
                                                            @endphp
                                                            <img src="{{ asset('/storage/uploads/berita/' . $thumbnailLastBerita[0]) }}"
                                                                width="85" height="65" style="object-fit: stretch"
                                                                alt="Semarang Urban Flood Resilience Project, Kerja Sama D2B Ditjen SDA dengan Pemerintah Belanda">
                                                        </a>
                                                    </div>
                                                    <div class="text-sm">
                                                        {{ $new->created_at->formatLocalized('%d %B %Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="post-info"> <a href="{{ url('/news/' . $new->slug) }}">
                                                        {{ $new->subject }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-css')
@endpush
@push('script-js')
@endpush
