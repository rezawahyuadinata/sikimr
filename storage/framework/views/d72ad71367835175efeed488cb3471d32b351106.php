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
                                <?php $__currentLoopData = $data->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading<?php echo e($loop->index); ?>">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($loop->index); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($loop->index); ?>">
                                                    <?php echo e($item->question); ?>

                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?php echo e($loop->index); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($loop->index); ?>">
                                            <div class="panel-body">
                                                <?php echo e($item->answer); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</div><?php /**PATH D:\Codes\Programs\sikimr\projek-sikimr\resources\views/layouts/faq.blade.php ENDPATH**/ ?>