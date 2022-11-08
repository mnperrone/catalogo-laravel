<?php $__env->startSection('contenido'); ?>

    <h1>Alta de una categoria</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/categoria/store" method="post">
        <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="catNombre">Nombre de la categoría</label>
                <input type="text" name="catNombre"
                       value="<?php echo e(old('catNombre')); ?>"
                       class="form-control" id="catNombre">
            </div>

            <button class="btn btn-dark my-3 px-4">Agregar categoría</button>
            <a href="/categorias" class="btn btn-outline-secondary">
                Volver a panel de categorías
            </a>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Repositorios\catalogo\resources\views/categoriaCreate.blade.php ENDPATH**/ ?>