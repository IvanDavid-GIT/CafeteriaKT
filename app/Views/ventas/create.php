<?= $cabecera; ?>


<h3 class="text-center"> Formulario de crear</h3>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de la venta</h5>
        <p class="card-text">
        <form method="post" action="<?= site_url('ventas/store') ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col">
                    <label for="idProducto">Producto</label>
                    <select class="form-control" id="idProducto" name="idProducto">
                        <option value="" selected="">Seleccione una opción</option>
                        <?php
                        $db = \Config\Database::connect();
                        $builder = $db->table('productos');
                        $builder->select('*');
                        $query = $builder->get();
                        $productos = $query->getResultArray();
                        $datos = array('productos' => $productos);
                        if (count($datos) > 0) {
                            foreach ($productos as $producto) {
                                echo '<option value="' . $producto['id'] . '" >' . $producto['nombre'] . '</option>';
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col">
                    <label for="cantidad">Cantidad</label>
                    <input id="cantidad" value="<?= old('cantidad') ?>" class="form-control" type="number" name="cantidad" onKeyPress="if(this.value.length==11) return false;">
                </div>
            </div>

            <button class="btn btn-success" type="submit">Crear</button>
            <a href="<?= base_url('ventas/index'); ?>" class="btn btn-info">Volver</a>
        </form>
        </p>
    </div>
</div>

<?= $pie; ?>