<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">Survote</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Auth::user()): ?>
                        <li><a href="<?php echo e(route('create.survey')); ?>">Create Survey</a></li>
                        <li><a href="<?php echo e(route('create.vote')); ?>">Create Vote</a></li>
                        <li><a href="<?php echo e(route('leaderboard')); ?>">Leaderboard</a></li>
                        <li><a href="<?php echo e(route('account')); ?>">Account</a></li>
                        <li><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php /**PATH C:\Users\bylux\PhpstormProjects\Survot\resources\views/includes/header.blade.php ENDPATH**/ ?>