

<?php $__env->startSection('title'); ?>
    User - <?php echo e($user->first_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="row">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <div>
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?php echo e($user->first_name); ?>" id="first_name">
            </div>
            <div>
                <label>Points : <?php echo e($user->points); ?></label>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bylux\PhpstormProjects\Survot\resources\views/user.blade.php ENDPATH**/ ?>