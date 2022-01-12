<?php $__env->startSection('content'); ?>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Contribute a Vote!</h3></header>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="post" data-postid="<?php echo e($post->id); ?>">
                    <p><?php echo e($post->body); ?></p>
                    <div href="#" class="info">
                        Posted by
                        <a href="<?php echo e(route('user', $post->user->id)); ?>" ><?php echo e($post->user->first_name); ?></a>
                         on <?php echo e($post->created_at); ?>

                    </div>
                    <div class="interaction">
                        <div class="form-group">
                            <form action="<?php echo e(route('vote')); ?>" method="post">
                                <fieldset id="group_<?php echo e($post->id); ?>">
                                    <?php if($post->option_1 != null): ?>
                                    <div class="radio-inline">
                                         <?php echo e(Form::radio('vote', '1', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 1, array('id' => "vote_".$post->id))); ?> <?php echo e($post->option_1); ?>

                                    </div>
                                    <?php endif; ?>
                                    <?php if($post->option_2 != null): ?>
                                    <div class="radio-inline">
                                        <?php echo e(Form::radio('vote', '2', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 2, array('id' =>  "vote_".$post->id))); ?> <?php echo e($post->option_2); ?>

                                    </div>
                                    <?php endif; ?>
                                    <?php if($post->option_3 != null): ?>
                                    <div class="radio-inline">
                                        <?php echo e(Form::radio('vote', '3',Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 3 , array('id' =>  "vote_".$post->id))); ?> <?php echo e($post->option_3); ?>

                                    </div>
                                    <?php endif; ?>
                                    <?php if($post->option_4 != null): ?>
                                    <div class="radio-inline">
                                        <?php echo e(Form::radio('vote', '4', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 4, array('id' =>  "vote_".$post->id))); ?> <?php echo e($post->option_4); ?>

                                    </div>
                                    <?php endif; ?>
                                    <?php if($post->option_5 != null): ?>
                                    <div class="radio-inline">
                                        <?php echo e(Form::radio('vote_', '5', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 5, array('id' => "vote_".$post->id))); ?> <?php echo e($post->option_5); ?>

                                    </div>
                                    <?php endif; ?>
                                </fieldset>
                                <button type="submit" id="<?php echo e($post->id); ?>" class="vote">Vote</button>
                        <?php if(Auth::user() == $post->user): ?>
                            </form>
                        </div>
                            <a href="#" class="edit">Edit</a> |
                            <a href="<?php echo e(route('post.delete', ['post_id' => $post->id])); ?>">Delete</a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = '<?php echo e(Session::token()); ?>';
        var urlEdit = '<?php echo e(route('edit')); ?>';
        var urlVote = '<?php echo e(route('vote')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bylux\PhpstormProjects\Survot\resources\views/dashboard.blade.php ENDPATH**/ ?>