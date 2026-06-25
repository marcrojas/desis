<?php

require_once("sql.php");

$idbodega = $_GET["idbodega"];

$sucursales = listar_sucursales($idbodega);

?>

<select name="sucursal" id="sucursal">

    <option value="-1"></option>

    <?php foreach($sucursales as $sucursal){ ?>

        <option value="<?= $sucursal["id"] ?>">
            <?= $sucursal["nombre"] ?>
        </option>

    <?php } ?>

</select>