<?php $__env->startSection('content'); ?>
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Start your vote!</h3></header>
            <form action="<?php echo e(route('post.create.vote')); ?>" method="post">
                <div class="form-group">
                    <textarea class="col-md-12 form-control" name="body" id="new-post" rows="1" placeholder="Your Question"></textarea>
                    <div class=" form-check">
                        <label class=" row form-check-label">
                            <div style="margin-top: 15px;" class="mt-12 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_1" id="option_1" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_2" id="option_2" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_3" id="option_3" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_4" id="option_4" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_5" id="option_5" rows="1" placeholder="Your Option"></textarea></div>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Post Vote</button>
                <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
            </form>
        </div>
    </section>
    <script>
        var token = '<?php echo e(Session::token()); ?>';
        var urlEdit = '<?php echo e(route('edit')); ?>';
        var urlVote = '<?php echo e(route('vote')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bylux\PhpstormProjects\Survot\resources\views/createvote.blade.php ENDPATH**/ ?>