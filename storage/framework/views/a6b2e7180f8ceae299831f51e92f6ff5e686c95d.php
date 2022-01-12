

<?php $__env->startSection('title'); ?>
    Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="<?php echo e(route('registerControl')); ?>" method="post">
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo e(Request::old('first_name')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="<?php echo e(Request::old('password')); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bylux\PhpstormProjects\Survot\resources\views/register.blade.php ENDPATH**/ ?>