<?= $cabecera; ?>


<h3 class="text-center"> Formulario de crear</h3>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del producto</h5>
        <p class="card-text">
        <form method="post" action="<?= site_url('/store') ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col">
                    <label for="nombre">Nombre de producto</label>
                    <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group col">
                    <label for="referencia">Referencia</label>
                    <input id="referencia" value="<?= old('referencia') ?>" class="form-control" type="text" name="referencia">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="precio">Precio</label>
                    <input id="precio" value="<?= old('precio') ?>" class="form-control" type="number" name="precio" onKeyPress="if(this.value.length==11) return false;">
                </div>
                <div class="form-group col">
                    <label for="peso">Peso</label>
                    <input id="peso" value="<?= old('peso') ?>" class="form-control" type="number" name="peso" onKeyPress="if(this.value.length==11) return false;">
                </div>
                <div class="form-group col">
                    <label for="stock">Stock</label>
                    <input id="stock" value="<?= old('stock') ?>" class="form-control" type="number" name="stock" onKeyPress="if(this.value.length==11) return false;">
                </div>

            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="categoria">Categoría</label>
                    <input id="categoria" value="<?= old('categoria') ?>" class="form-control" type="text" name="categoria">
                </div>
                <div class="form-group col">
                    <label for="fecha">Fecha de creación</label>
                    <input id="fecha" value="<?php echo date("Y-m-d"); ?>" class="form-control" type="date" name="fecha">
                </div>
            </div>

            <button class="btn btn-success" type="submit">Crear</button>
            <a href="<?= base_url('index'); ?>" class="btn btn-info">Volver</a>
        </form>
        </p>
    </div>
</div>

<?= $pie; ?>