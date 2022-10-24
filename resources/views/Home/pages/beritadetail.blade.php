@extends('Home.layouts.layouthome')

@section('section')
    @php
        setlocale(LC_TIME, 'id');
        $thumbnailBerita = explode('|', $news->thumbnail);

        // Maximal Gambar yang dapat di berikan proses hanya sampai dengan 5
        $namaBerita = $news->thumbnail;
        $jpg = '.jpg';
        $jpeg = '.jpeg';
        $png = '.png';
        if (strpos($namaBerita, $jpg) == true) {
            // echo 'file ini jpg';
            $namaBerita = explode('jpg|', $news->thumbnail);
        } elseif (strpos($namaBerita, $jpeg) == true) {
            // echo 'file ini jpeg';
            $namaBerita = explode('jpeg|', $news->thumbnail);
        } else {
            // echo 'file ini png';
            $namaBerita = explode('png|', $news->thumbnail);
        }
    @endphp
    <section class="py-3" id="berita">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-8 mx-auto">
                    <h2>{{ $news->subject }}</h2>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-4">
                    <div class="card card-plain">
                        <div class="card-header p-0 position-relative">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Kategori : {{ !$news->category ? '-' : $news->name }}
                                        </div>
                                        <div class="col-md-6" style="text-align: end">
                                            <strong>
                                                {{ $news->created_at->formatLocalized('%d %B %Y, %H:%M:%S') }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-interval="4500"
                                data-bs-pause="false" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($thumbnailBerita as $key => $item)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <a class="d-block blur-shadow-image">
                                                <img style="background-size: contain"
                                                    src="{{ asset('/storage/uploads/berita/' . $thumbnailBerita[$key]) }}"
                                                    alt="img-blur-shadow" class="img-fluid img-thumbnail" loading="lazy">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-interval="4500"
                                data-bs-pause="false" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($namaBerita as $key => $item)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <a class="d-block blur-shadow-image">
                                            </a>
                                            <div class="d-block w-100">
                                                <p
                                                    style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; padding-top: .5rem; font-weight: bold; color: black ">
                                                    {{ $namaBerita[$key] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body p-0 px-1">
                                <p
                                    style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; padding-top: .5rem; font-weight: 400; color: black">
                                    {!! $news->description !!}
                                </p>
                            </div>
                        </div>
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
                                @foreach ($berita->sortByDesc('created_at') as $new)
                                    <li class="mb-3 " style="list-style: none;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="post-image">
                                                    <div class="logo img ">
                                                        <a href="{{ url('/news/' . $new->slug) }}">
                                                            @php
                                                                $thumbnailLastBerita = explode('|', $new->thumbnail);
                                                            @endphp
                                                            <img src="{{ asset('/storage/uploads/berita/' . $thumbnailLastBerita[0]) }}"
                                                                width="85" height="65" style="object-fit: stretch""
                                                                alt="Image">
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
