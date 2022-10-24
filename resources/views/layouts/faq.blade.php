<div class="modal fade" id="modal-faq" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-faq">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-faq-title">FAQ </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                @foreach ($data->faq as $item)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{ $loop->index }}">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                                                    {{ $item->question }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{ $loop->index }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $loop->index }}">
                                            <div class="panel-body">
                                                {{ $item->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>