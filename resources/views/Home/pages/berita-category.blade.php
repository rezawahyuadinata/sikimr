@extends('Home.layouts.layouthome')

@section('section')
    <section class="py-3" id="berita">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Berita</h2>
                </div>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class=" col-md-8">
                        <div class="row">
                            @if (!$cat->isEmpty())
                                @foreach ($cat->sortByDesc('created_at') as $item)
                                    <div class="col-lg-6 col-sm-3 mx-">
                                        <div class="card card-plain">
                                            <div class="card-header p-0 position-relative">
                                                <a class="d-block blur-shadow-image">
                                                    @php
                                                        $thumbnailBerita = explode("|", $item->thumbnail);
                                                    @endphp
                                                    <img src="{{ asset('/storage/uploads/berita/' . $thumbnailBerita[0]) }}"
                                                        alt="img-blur-shadow" class="img img-thumbnail" loading="lazy"
                                                        style="width: 100%; height: 15vw; object-fit: cover;">
                                                </a>
                                            </div>
                                            <div class="card-body px-0">
                                                <h5>
                                                    <a href="{{ url('/news/' . $item->slug) }}"
                                                        class="text-dark font-weight-bold">{{ $item->subject }}</a>
                                                </h5>
                                                <p>
                                                    {!! substr_replace($item->description, ' ...', 90) !!}
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
                            @else
                                <h2>Tidak ada berita dalam kategori Ini</h2>
                            @endif
                        </div>
                    </div>
                    <div class=" col-md-4"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-css')
@endpush
@push('script-js')
@endpush
