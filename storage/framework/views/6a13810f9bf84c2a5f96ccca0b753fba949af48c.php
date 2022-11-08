<?php $__env->startSection('contenido'); ?>

    <h1>Modificación de un producto</h1>

    <div class="alert p-4 col-8 mx-auto shadow">
        <form action="/producto/update" method="post" enctype="multipart/form-data">
        <?php echo method_field('put'); ?>
        <?php echo csrf_field(); ?>
            <div class="form-group mb-4">
                <label for="prdNombre">Nombre del Producto</label>
                <input type="text" name="prdNombre"
                       value="<?php echo e(old('prdNombre', $Producto->prdNombre)); ?>"
                       class="form-control" id="prdNombre">
            </div>

            <label for="prdPrecio">Precio del Producto</label>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="number" name="prdPrecio"
                       value="<?php echo e(old('prdPrecio', $Producto->prdPrecio)); ?>"
                       class="form-control" id="prdPrecio" min="0" step="0.01">
            </div>

            <div class="form-group mb-4">
                <label for="idMarca">Marca</label>
                <select class="form-select" name="idMarca" id="idMarca">
                    <option value="">Seleccione una marca</option>
            <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if( old('idMarca', $Producto->idMarca)==$marca->idMarca ): echo 'selected'; endif; ?> value="<?php echo e($marca->idMarca); ?>"><?php echo e($marca->mkNombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
            </div>

            <div class="form-group mb-4">
                <label for="idCategoria">Categoría</label>
                <select class="form-select" name="idCategoria" id="idCategoria">
                    <option value="">Seleccione una categoría</option>
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if( old('idCategoria', $Producto->idCategoria)==$categoria->idCategoria ): echo 'selected'; endif; ?> value="<?php echo e($categoria->idCategoria); ?>"><?php echo e($categoria->catNombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="prdDescripcion">Descripción del Producto</label>
                <textarea name="prdDescripcion" class="form-control"
                          id="prdDescripcion"><?php echo e(old('prdDescripcion', $Producto->prdDescripcion)); ?></textarea>
            </div>

            <div>
                Imagen actual:
                <figure class="d-flex justify-content-center">
                    <img src="/imagenes/productos/<?php echo e($Producto->prdImagen); ?>" class="img-thumbnail">
                </figure>
            </div>

            Modificar imagen (opcional):
            <div class="custom-file mt-1 mb-4">
                <input type="file" name="prdImagen"  class="custom-file-input" id="customFileLang" lang="es">
                <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco">Seleccionar Archivo: </label>
            </div>

            <input type="hidden" name="idProducto"
                   value="<?php echo e($Producto->idProducto); ?>">
            <input type="hidden" name="imgActual"
                   value="<?php echo e($Producto->prdImagen); ?>">

            <button class="btn btn-dark mr-3 px-4">Modificar producto</button>
            <a href="/productos" class="btn btn-outline-secondary">
                Volver a panel de productos
            </a>

        </form>
    </div>

    <?php echo $__env->make( 'layouts.msgValidacion' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Repositorios\catalogo\resources\views/productoEdit.blade.php ENDPATH**/ ?>