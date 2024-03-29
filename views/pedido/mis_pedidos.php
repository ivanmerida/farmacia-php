<?php if (isset($gestion)) : ?>
    <div class="row titulo-seccion">
        <div class="col-md-12">
            <h3>Gestionar pedidos</h3>
        </div>
    </div>
<?php else : ?>
    <div class="row titulo-seccion">
        <div class="col-md-12">
            <h3>Mis pedidos</h3>
        </div>
    </div>
<?php endif; ?>

<table>
    <tr>
        <th>No Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while ($ped = $pedidos->fetch_object()) : ?>
        <tr>
            <td>
                <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>">
                    <?= $ped->id ?>
                </a>
            </td>
            <td>
                $<?= $ped->coste ?>
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
                <?= Utils::showStatus($ped->estado) ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>