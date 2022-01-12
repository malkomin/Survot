<?php $__env->startSection('content'); ?>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Contribute a Vote!</h3></header>
            <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(route('survey.take')); ?>" method="post">
                <article class="post" data-postid="<?php echo e($survey->id); ?>">
                    <?php $__currentLoopData = \App\Models\SurveyQuestion::all()->where('survey_id', $survey->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($question->body); ?></p>
                        <div href="#" class="info">
                            Posted by
                            <a href="<?php echo e(route('user', $survey->user->id)); ?>" ><?php echo e($survey->user->first_name); ?></a>
                            on <?php echo e($survey->created_at); ?>

                        </div>
                        <div class="interaction">
                            <div class="form-group">
                                    <fieldset id="group_<?php echo e($survey->id); ?>">
                                        <?php if($question->option_1 != null): ?>
                                            <div class="radio-inline">
                                            <?php echo e(Form::radio('question['.$question->question_id.']', '1', Auth::user()->answers()->where('survey_id', $survey->id)->first() != null && Auth::user()->answers()->where('question_id', $question->question_id)->first()->option == 1, array('id' => "answer_".$survey->id))); ?>

                                            <?php echo e($question->option_1); ?>

                                         </div>
                                        <?php endif; ?>
                                        <?php if($question->option_2 != null): ?>
                                            <div class="radio-inline">
                                                <?php echo e(Form::radio('question['.$question->question_id.']', '2', Auth::user()->answers()->where('survey_id', $survey->id)->first() != null && Auth::user()->answers()->where('question_id', $question->question_id)->first()->option == 2, array('id' => "answer_".$question->question_id))); ?>

                                                <?php echo e($question->option_2); ?>

                                         </div>
                                        <?php endif; ?>
                                    </fieldset>
                            </div>
                            <?php if(Auth::user() == $survey->user): ?>
                            <a href="#" class="edit">Edit</a> |
                            <a href="<?php echo e(route('survey.delete', ['$survey' => $survey->id])); ?>">Delete</a>
                            <?php endif; ?>
                        </div>
                </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button type="submit"  class="btn btn-primary"  >Finish Survey</button>
                    <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
                    <input type="hidden" value="<?php echo e($survey->id); ?>" name="survey_id">
                </form>
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
        var urlSurveyEdit = '<?php echo e(route('survey.edit')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bylux\PhpstormProjects\Survot\resources\views/dashboard_surveys.blade.php ENDPATH**/ ?>