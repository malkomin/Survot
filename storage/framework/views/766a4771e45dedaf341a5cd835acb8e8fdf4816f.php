

<?php $__env->startSection('title'); ?>
    Leaderboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table>
        <tr>
            <th>User Name</th>
            <th>Points</th>
        </tr>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <a href="<?php echo e(route('user' , $user->id)); ?>"> <?php echo e($user->first_name); ?></a> </td>
            <td><?php echo e($user->points); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bylux\PhpstormProjects\Survot\resources\views/leaderboard.blade.php ENDPATH**/ ?>