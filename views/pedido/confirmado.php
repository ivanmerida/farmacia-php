<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] = 'complete'): ?>
<h1>Tu pedido se ha confirmado</h1>
<p>
    Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria
    7382947289239ADD con el coste del pedido, sera procesado y enviado.
</p>
<br>
<?php if (isset($pedido)): ?>
<h3>Datos del pedido: </h3>
<p>Numero de pedido: <?=$pedido->id?></p>
<p>Total a pagar: <?=$pedido->coste?></p>
<h3>Productos:</h3>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php while ($producto = $productos->fetch_object()): ?>
    <tr class='table'>
        <td>
            <?php if ($producto->imagen != null): ?>
            <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="Imagen del producto" class="img_carrito">
            <?php else: ?>
            <img src="<?=base_url?>assets/imagenes/camiseta.png" alt="Imagen del producto" class="img_carrito">
            <?php endif;?>
        </td>
        <td>
            <a href="<?=base_url?>/producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
        </td>
        <td>
            <?=$producto->precio?>
        </td>
        <td>
            <?=$producto->unidades?>
        </td>
    </tr>
    <?php endwhile;?>
</table>
<?php endif;?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
<h1>Tu pedido No ha podido realizarce</h1>
<?php endif;?>