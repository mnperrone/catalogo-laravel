<?php $__env->startSection('contenido'); ?>

    <h1>Modificación de una categoria</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/categoria/update" method="post">
        <?php echo method_field('put'); ?>
        <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="catNombre">Nombre de la categoria</label>
                <input type="text" name="catNombre"
                       value="<?php echo e(old('catNombre', $Categoria->catNombre)); ?>"
                       class="form-control" id="catNombre">
            </div>
            <input type="hidden" name="idCategoria"
                   value="<?php echo e($Categoria->idCategoria); ?>">

            <button class="btn btn-dark my-3 px-4">Modificar categoria</button>
            <a href="/categorias" class="btn btn-outline-secondary">
                Volver a panel de categorias
            </a>
        </form>
    </div>

    <?php echo $__env->make( 'layouts.msgValidacion' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Repositorios\catalogo\resources\views/categoriaEdit.blade.php ENDPATH**/ ?>