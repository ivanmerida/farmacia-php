<div class="row titulo-seccion">
    <div class="col-md-12">
        <h3>Gestionar categorías</h3>
    </div>
</div>
<a href="<?= base_url ?>categoria/crear" class="button button-small">
    Crear categoría
</a>

<?php if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete') : ?>
    <strong class="alert_green">La categoría se ha añadido correctamente</strong>
<?php elseif (isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'complete') : ?>
    <strong class="alert_red">La categoría NO se ha añadido correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('categoria'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_green">La categoría se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong class="alert_red">La categoría NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACCIONES</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>
            <td>
                <!--AL SER EL TERCER PARAMETRO GET DEBE SER CON &-->
                <a href="<?= base_url ?>categoria/editar&id=<?= $cat->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>categoria/eliminar&id=<?= $cat->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>