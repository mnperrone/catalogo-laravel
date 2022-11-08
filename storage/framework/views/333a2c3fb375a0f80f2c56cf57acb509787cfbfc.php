<?php $__env->startSection('contenido'); ?>

    <h1>Baja de una categoria</h1>

    <div class="alert alert-danger col-6 mx-auto p-4">

        Se eliminará la categoria:
        <span class="lead">
                <?php echo e($Categoria->catNombre); ?>

            </span>
        <form action="/categoria/destroy" method="post">
            <?php echo method_field('delete'); ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="catNombre"
                   value="<?php echo e($Categoria->catNombre); ?>">
            <input type="hidden" name="idCategoria"
                   value="<?php echo e($Categoria->idCategoria); ?>">
            <button class="btn btn-danger btn-block my-3">
                Confirmar baja
            </button>
            <a href="/categorias" class="btn btn-light btn-block">
                volver a panel
            </a>
        </form>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Repositorios\catalogo\resources\views/categoriaDelete.blade.php ENDPATH**/ ?>