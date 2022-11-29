@extends('Home.layouts.layouthome')

@section('section')
    <section class="py-7">
        <div class="container">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-12 text-center mx-auto">
                        <h2>Hukum</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 mx-auto">
                        <ul class="nav nav-pills nav-pills-rose flex-column nav-fill p-1" role="tablist">
                            @foreach ($hukum as $item)
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#{{ $item->file_category }}"
                                        role="tab" aria-controls="profile" aria-selected="true">
                                        {{ $item->file_category }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            @foreach ($hukum as $item)
                                <div class="tab-pane  active justify-content-center" id="{{ $item->file_category }}">
                                    <div class="album">
                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        {{-- catatan: <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg" role="img"
                                                            aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg> --}}
                                                        <embed
                                                            src="http://127.0.0.1:8000/storage/uploads/hukum/SE_1657683762.pdf#toolbar=0&navpanes=0&scrollbar=0"
                                                            type="application/pdf"
                                                            style="overflow: hidden !important; max-width:100%; height: auto;">
                                                        <div class="card-body">
                                                            <p class="card-text">{{ $item->name }}</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- catatan: <section class="py-3 position-relative mx-n3">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Hukum</h2>
                </div>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="d-flex align-items-start">
                            <div class="nav stick mt-5 flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($hukum as $item)
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="v-pills-home"
                                        aria-selected="true">{{ $item->file_category }}</button>
                                @endforeach
                                <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="true">Profile</button>
                            </div>
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <div class="album py-5 bg-white">
                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                                @foreach ($hukum as $item)
                                                    <div class="col">
                                                        <div class="card shadow-sm">
                                                            <embed
                                                                src="http://127.0.0.1:8000/storage/uploads/hukum/SE_1657683762.pdf"
                                                                type="application/pdf"
                                                                style="overflow: hidden !important; max-width:100%; height: auto;">

                                                            <div class="card-body">
                                                                <p class="card-text">
                                                                    {{ $item->name }}
                                                                </p>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <div class="btn-group">
                                                                        <a href="{{ asset('storage/uploads/hukum/' . $item->file_name) }}"
                                                                            target="_blank"
                                                                            class="btn btn-sm btn-outline-secondary">View</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                asd
                                                            </p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                asd
                                                            </p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab" tabindex="0">
                                    <div class="album py-5 bg-white">
                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">ANJING</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">This is a wider card with supporting text
                                                                below as a natural lead-in to additional content. This
                                                                content is a little bit longer.</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">This is a wider card with supporting text
                                                                below as a natural lead-in to additional content. This
                                                                content is a little bit longer.</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">This is a wider card with supporting text
                                                                below as a natural lead-in to additional content. This
                                                                content is a little bit longer.</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">This is a wider card with supporting text
                                                                below as a natural lead-in to additional content. This
                                                                content is a little bit longer.</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        <svg class="bd-placeholder-img card-img-top" width="100%"
                                                            height="225" xmlns="http://www.w3.org/2000/svg"
                                                            role="img" aria-label="Placeholder: Thumbnail"
                                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                                            <title>Placeholder</title>
                                                            <rect width="100%" height="100%" fill="#55595c" /><text
                                                                x="50%" y="50%" fill="#eceeef"
                                                                dy=".3em">Thumbnail</text>
                                                        </svg>

                                                        <div class="card-body">
                                                            <p class="card-text">This is a wider card with supporting text
                                                                below as a natural lead-in to additional content. This
                                                                content is a little bit longer.</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                                </div>
                                                                <small class="text-muted">9 mins</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
@push('script-css')
@endpush
@push('script-js')
@endpush
