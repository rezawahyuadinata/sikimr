@extends('layouts.layout_menu_all')

@section('content')
    <style>
        /* Just makin' it look nice. */
        body {
            background: #9fc7c0;
        }

        .conditional {
            margin: 1em 0 0.5em;
            border-top: 2px dotted #eee;
            padding-top: 1em;
            color: rgba(0, 0, 0, .7);
            font-size: .9em;
        }

        .conditional>.conditional {
            color: rgba(0, 0, 0, .5);
        }

        #demo {
            text-align: center;
            padding: 1.5em 3em;
            background: #fff;
            width: 60vw;
            margin: 2em auto;
            border-radius: .5em;
            font: 24px/30px 'Open Sans', Arial, Verdana, serif;
        }

        label {
            vertical-align: middle;
            position: relative;
        }

        label+label {
            margin-left: 1em;
        }

        input+span {
            position: absolute;
            left: 0;
            top: 4px;
            width: 15px;
            height: 15px;
            border: 2px solid #6ab5a8;
        }

        input[type=radio]+span {
            border-radius: 50%;
        }

        input[type=radio]:checked+span {
            background: rgba(106, 181, 169, 1);
            background: -moz-radial-gradient(center, ellipse cover, rgba(106, 181, 169, 1) 44%, rgba(255, 255, 255, 1) 45%, rgba(255, 255, 255, 1) 46%, rgba(255, 255, 255, 1) 55%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(44%, rgba(106, 181, 169, 1)), color-stop(45%, rgba(255, 255, 255, 1)), color-stop(46%, rgba(255, 255, 255, 1)), color-stop(55%, rgba(255, 255, 255, 1)));
            background: -webkit-radial-gradient(center, ellipse cover, rgba(106, 181, 169, 1) 44%, rgba(255, 255, 255, 1) 45%, rgba(255, 255, 255, 1) 46%, rgba(255, 255, 255, 1) 55%);
            background: -o-radial-gradient(center, ellipse cover, rgba(106, 181, 169, 1) 44%, rgba(255, 255, 255, 1) 45%, rgba(255, 255, 255, 1) 46%, rgba(255, 255, 255, 1) 55%);
            background: -ms-radial-gradient(center, ellipse cover, rgba(106, 181, 169, 1) 44%, rgba(255, 255, 255, 1) 45%, rgba(255, 255, 255, 1) 46%, rgba(255, 255, 255, 1) 55%);
            background: radial-gradient(ellipse at center, rgba(106, 181, 169, 1) 44%, rgba(255, 255, 255, 1) 45%, rgba(255, 255, 255, 1) 46%, rgba(255, 255, 255, 1) 55%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#6ab5a9', endColorstr='#ffffff', GradientType=1);
        }

        input[type=checkbox]:checked+span:after {
            content: "\00d7";
            font-weight: bold;
            position: absolute;
            top: -7px;
            left: 1px;
            font-size: 20px;
            color: #6ab5a8;
        }

        input[type=radio],
        input[type=checkbox] {
            /*hide the radio button*/
            filter: alpha(opacity=0);
            -moz-opacity: 0;
            -khtml-opacity: 0;
            opacity: 0;
        }

        select,
        input[type=text] {
            border-radius: 5px;
            padding: 6px 10px;
            border: 2px solid #9fc7c0;
            font-color: #666;
            font-size: 15px;
        }
    </style>
    <div class="row">
        <div class="form-group col-sm-2">
            @isset($data->page->fitur->create)
                <label>&nbsp;</label>
                <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
                    Tambah
                </button>
            @endisset
        </div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-12"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">
                    <table id="table-data" class="display table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false">#</th>
                                <th data-orderable="true">Caption</th>
                                <th data-orderable="true">Kategori</th>
                                <!-- <th data-orderable="true">Gambar</th> -->
                                <th data-orderable="false"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-data" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-data-title">Form Gallery</h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="caption">Caption File</label>
                                <input type="text" required class="form-control" id="caption" name="caption" />
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label">Kategori</label>
                                <select name="category" id="category" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    <option value="Gambar">Gambar</option>
                                    <option value="Vidio">Vidio</option>
                                </select>
                            </div>

                            {{-- <div class="form-group col-sm-12">
                                <label class="control-label">Kategori</label>
                                <select name="category" id="category" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    <option id="yes" name="yesOrNo" value="Gambar"
                                        onchange="displayQuestion(this.value)">Gambar</option>
                                    <option id="no" name="yesOrNo" value="Vidio"
                                        onchange="displayQuestion(this.value)">Vidio</option>
                                </select>
                            </div>
                            <label>
                                <input type="radio" id="yes" name="yesOrNo" value="yes"
                                    onchange="displayQuestion(this.value)" />Yes</label>
                            <label>
                                <input type="radio" id="no" name="yesOrNo" value="no"
                                    onchange="displayQuestion(this.value)" />No</label>

                            <div id="yesQuestion" style="display:none;"><br />
                                <label for="file_name">File</label>
                                <input type="file" required class="form-control" id="file_name" name="file_name"
                                    accept="image/*,video/mp4,video/x-m4v,video/*" />
                            </div>

                            <div id="noQuestion" style="display:none;"><br />
                                <label for="Link Youtube">Url</label>
                                <input type="url" required class="form-control" id="file_name" name="file_name">
                            </div> --}}
                            {{-- <div class="form-group col-lg-12 form-hide">
                                <div id="yesQuestion" style="display:none;"><br />
                                    <label for="file_name">File</label>
                                    <input type="file" required class="form-control" id="file_name" name="file_name"
                                        accept="image/*,video/mp4,video/x-m4v,video/*" />
                                </div>

                                <div id="noQuestion" style="display:none;"><br />
                                    <label for="Link Youtube">Url</label>
                                    <input type="url" required class="form-control" id="file_name" name="file_name">
                                </div>
                            </div> --}}


                            <!-- <div class="form-group col-sm-12">
                                                                                                                                                                                                                                                </select>
                                                                                                                                                                                                                                        </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var urlData = '{{ route($data->page->class . '.read') }}';
        var urlInsert = '{{ route($data->page->class . '.store') }}';
        var urlUpdate = '{{ route($data->page->class . '.update') }}';
        var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
        var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
        var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
    </script>
    <script>
        const select = document.querySelector('select');
        const para = document.querySelector('div');

        select.addEventListener('change', setWeather);

        function setWeather() {
            const choice = select.value;

            if (choice === 'sunny') {
                para.textContent =
                    'It is nice and sunny outside today. Wear shorts! Go to the beach, or the park, and get an ice cream.';
            } else {
                para.textContent = '';
            }
        }
    </script>
    <script>
        function displayQuestion(answer) {

            document.getElementById(answer + 'Question').style.display = "block";

            if (answer == "yes") { // hide the div that is not selected

                document.getElementById('noQuestion').style.display = "none";

            } else if (answer == "no") {

                document.getElementById('yesQuestion').style.display = "none";

            }

        }
    </script>
    <script>
        function(params) {

        }
    </script>
@endsection
