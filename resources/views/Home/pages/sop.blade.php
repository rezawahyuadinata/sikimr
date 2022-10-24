@extends('Home.layouts.layouthome')

@section('section')
    <section class="py-7">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h1>Library SOP Ditjen SDA</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="nav-wrapper position-sticky end-0">
                        <ul class="nav nav-pills nav-pills-rose flex-column nav-fill p-1" role="tablist">
                            @foreach ($sopCat as $key => $item)
                                <li class="nav-item" style="text-align: start">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                        href="#tabs-{{ $item->id }}" role="tab" aria-controls="profile"
                                        aria-selected="true">
                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;{{ $item->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content">
                        @foreach ($sopCat as $key => $item)
                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }} in" id="tabs-{{ $item->id }}">
                                <div class="album">
                                    <div class="container">
                                        <div class="table-responsive">
                                            <table id="table-sop-{{ $key }}" class="table table-hover"
                                                style="border: 10px">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Nama SOP
                                                        </th>
                                                        <th>
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sop->where('status', '3')->where('category', $item->id) as $items)
                                                        <tr>
                                                            <td style="min-width: 500px; max-width: 500px;">
                                                                <span style=" white-space: normal;">
                                                                    SOP - {{ $items->name }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <div class="btn-group">
                                                                        <a href="{{ asset('storage/uploads/sop/' . $items->file_name) }}"
                                                                            target="_blank"
                                                                            class="btn btn-sm btn-outline-secondary">View</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-css')
    <style>
        .dataTables_filter input {
            border: 1px solid black;
            color: black;
            font-weight: 200;
        }

        .dataTables_filter:hover input {
            border: 1px solid black
        }
    </style>
@endpush
@push('script-js')
    <script>
        $(document).ready(function() {
            const sopCat = {!! $sopCat !!}

            sopCat.forEach((element, index) => {
                $('#table-sop-' + index).DataTable({
                    pageLength: 5,
                    lengthChange: false,
                    scrollx: true,
                    info: false,
                    columnDefs: [{
                        targets: [1],
                        orderable: false
                    }],
                    language: {
                        paginate: {
                            next: '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
                            previous: '<i class="fa fa-arrow-left" aria-hidden="true"></i>'
                        }
                    }
                });
            });
        });
    </script>
@endpush
