<?= $cabecera; ?>

<a class="btn btn-success" href="<?= base_url('ventas/create') ?>">Crear una venta</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($ventas as $venta) : ?>
            <tr>
                <td><?= $venta['idProducto']; ?></td>
                <td><?= $venta['cantidad']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $pie; ?>