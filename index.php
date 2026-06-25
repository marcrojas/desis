<?php

require_once("sql.php");

$bodegas = listar_bodegas();
$monedas = listar_monedas();
$materiales = listar_materiales();

?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ingreso de productos</title>

        <link rel="stylesheet" href="css/estilos.css?v=<?php echo time(); ?>">
        <script src="js/guardar_producto.js"></script>
        <script src="js/sucursales.js"></script>

    </head>
    <body>
        <div id="contenedor_principal">
            <div id="titulo">
                <h1>Formulario de Producto</h1>
            </div>
            <div class="fila">
                <div class="seccion">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo">
                </div>

                <div class="seccion">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
            </div>

            <div class="fila">
                <div class="seccion">
                    <label for="bodega">Bodega</label>
                    <select id="bodega" name="bodega" onchange="lista_sucursales()">
                        <option value="-1"></option>
                        <?php foreach($bodegas as $bodega){ ?>
                            <option value="<?= $bodega["id"] ?>"><?= $bodega["nombre"] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="seccion">
                    <label for="sucursal">Sucursal</label>
                    <div id="html_sucursales">
                        <select id="sucursal" name="sucursal">
                            <option value="-1"></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="fila">
                <div class="seccion">
                    <label for="moneda">Moneda</label>
                    <select id="moneda" name="moneda">
                        <option value="-1"></option>
                        <?php foreach($monedas as $moneda){ ?>
                            <option value="<?= $moneda["id"] ?>"><?= $moneda["nombre"] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="seccion">
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" name="precio">
                </div>
            </div>

            <!-- MATERIALES -->
            <div class="fila">
                <div class="seccion">
                    <label>Material</label>
                    <div class="checkbox-group">
                        <?php foreach($materiales as $material){ ?>
                        <label>
                            <input type="checkbox" name="material[]" value="<?= $material["id"] ?>">
                            <?= $material["nombre"] ?>
                        </label>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="fila">
                <div class="seccion">
                    <label for="descripcion">Descripción</label>
                    <textarea rows="3" name="descripcion" id="descripcion"></textarea>
                </div>
            </div>

            <div class="btn_guardar">
                <button type="button" onclick="guardar()">Guardar Producto</button>
            </div>

        </div>
    </body>
</html>