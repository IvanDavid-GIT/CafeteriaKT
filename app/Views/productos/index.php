<?= $cabecera; ?>
<a class="btn btn-success" href="<?= base_url('create') ?>">Crear un producto</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre de producto</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Fecha de creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td><?= $producto['nombre']; ?></td>

                <td><?= $producto['referencia']; ?></td>

                <td><?= $producto['precio']; ?></td>

                <td><?= $producto['peso']; ?></td>

                <td><?= $producto['categoria']; ?></td>

                <td><?= $producto['stock']; ?></td>

                <td><?= $producto['fecha']; ?></td>

                <td>
                    <a href="<?= base_url('edit/' . $producto['id']); ?>" class="btn btn-info" type="button">Editar</button>

                        <a href="<?= base_url('delete/' . $producto['id']); ?>" class="btn btn-danger" type="button">Borrar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $pie; ?>