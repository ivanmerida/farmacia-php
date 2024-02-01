<div class="row titulo-seccion">
        <div class="col-md-12">
            <h3>Detalle del pedido</h3>
        </div>
</div>
<?php if (isset($pedido)): ?>
    <?php if(isset($_SESSION['admin'])): ?>
        <h3>Cambiar el estado del pedido</h3>
        <form action="<?=base_url?>Pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?=$pedido->estado == 'confirm' ? 'selected' : ''?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected' : ''?>>En preparacion</option>
                <option value="ready" <?=$pedido->estado == 'ready' ? 'selected' : ''?>>Preparado</option>
                <option value="sended" <?=$pedido->estado == 'sended' ? 'selected' : ''?>>Enviado</option>
                <input type="submit" value="Cambiar estado">
            </select>
        </form>
        <br>
    <?php endif; ?>
<h3>Datos del usuario</h3>
<p>Nombre: <?=$pedido->nombre?></p>
<p>Correo: <?=$pedido->email?></p>
<p>Telefono: <?=$pedido->telefono?></p>
<!-- ---------------------------------------------------------------------  -->
<h3>Direccion del envio</h3>
<p>Municipio: <?=$pedido->municipio?></p>
<p>Localidad: <?=$pedido->localidad?></p>
<p>Direccion: <?=$pedido->direccion?></p>
<p>Referencia: <?=$pedido->referencia?></p>

<!-- ---------------------------------------------------------------------  -->
<h3>Datos del pedido: </h3>
<p>Estado: <?=Utils::showStatus($pedido->estado)?></p>
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
            <img src="<?=imagen_defecto?>" alt="Imagen del producto" class="img_carrito">
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
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
<h1>Tu pedido No ha podido realizarce</h1>
<?php endif;?>