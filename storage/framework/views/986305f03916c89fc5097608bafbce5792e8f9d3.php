
<?php if( $errors->any() ): ?>
<div class="alert alert-danger col-8 mx-auto">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <i class="bi bi-exclamation-triangle"></i>
            <?php echo e($error); ?>

        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
<?php /**PATH C:\Repositorios\catalogo\resources\views/layouts/msgValidacion.blade.php ENDPATH**/ ?>