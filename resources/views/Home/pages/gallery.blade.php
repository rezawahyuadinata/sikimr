@extends('Home.layouts.layouthome')

@section('section')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-simple"
                                    role="tab" aria-controls="profile" aria-selected="true">
                                    Photos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple"
                                    role="tab" aria-controls="dashboard" aria-selected="false">
                                    Videos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="profile-tabs-simple" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="container">
                            <div class="row my-5">
                                <div class="col-md-12 mx-auto text-center">
                                    <h2>Gallery Photo</h2>
                                </div>
                            </div>
                            <div class="row mt-5">
                                @foreach ($galleries->sortByDesc('created_at') as $item)
                                    <div class="col-md-4 my-5">
                                        <div class="card-group">
                                            <div class="card" data-animation="true">
                                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                    <a class="d-block blur-shadow-image"
                                                        style="width: 100%; height: 15vw; object-fit: cover;"
                                                        data-src="{{ asset('/storage/uploads/gallery/' . $item->file_name) }}">
                                                        <img src="{{ asset('/storage/uploads/gallery/' . $item->file_name) }}"
                                                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg"
                                                            style="width: 100%; height: 15vw; object-fit: cover;"
                                                            onclick="change(this.src)">
                                                    </a>
                                                    <div class="colored-shadow"
                                                        style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="d-flex mt-n6 mx-auto">
                                                        <div class="ms-auto border-0 col-md-12 mx-auto text-center">
                                                            <p class="text-dark mt-1">{{ $item->caption }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $galleries->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane2 fade" id="dashboard-tabs-simple" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab">
                    <div class="container">
                        <div class="row my-5">
                            <div class="col-md-12 mx-auto text-center">
                                <h2>Gallery Video</h2>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4 my-5">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h9VoYcjoUi0"
                                        allowfullscreen height="300" width="100%" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    <div>
                                        Cerita Sebuah Catatan - Mencari Sosok Agam Meura h #EP03
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-5">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/D-b6gxfmEeY"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <div>
                                        Bermain Hide n Seek Bersama Jin - Phasmophobia Indonesia #3
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-5">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/S3Cz8HSfLcQ"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <div>
                                        Mari Kita Berkunjung Ke Rumah Granny - Granny 3 Indonesia - Part 1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('script-css')
    <style>
        .tab-pane.active {
            animation: slide-down 0.5s ease-out;
        }

        @keyframes slide-down {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .tab-pane2.active {
            animation: slide-down1 0.5s ease-out;
        }

        @keyframes slide-down1 {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
@endpush
@push('script-js')
    <script type="text/javascript">
        const change = src => {
            document.getElementById('main').src = src
        }
    </script>
@endpush
