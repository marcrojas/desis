<?php

    require_once("conexion.php");

    function listar_bodegas(){

        global $conexion;

        $sql = "SELECT * FROM bodegas WHERE estado=1 ORDER BY nombre ASC";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }


    function listar_sucursales($idbodega){

        global $conexion;

        $sql = "SELECT *
                FROM sucursales
                WHERE estado = 1
                AND idbodega = ?
                ORDER BY nombre ASC";

        $stmt = $conexion->prepare($sql);
        $stmt->execute([$idbodega]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    function listar_monedas(){

        global $conexion;

        $sql = "SELECT * FROM monedas WHERE estado=1 ORDER BY nombre ASC";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }



    function listar_materiales(){

        global $conexion;

        $sql = "SELECT * FROM materiales WHERE estado=1 ORDER BY id ASC";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    function buscar_codigo($codigo){

        global $conexion;

        $sql = "SELECT COUNT(*) AS total
            FROM productos
            WHERE codigo = ?";

        $stmt = $conexion->prepare($sql);
        $stmt->execute([$codigo]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado["total"] > 0;

    }


    function guardar_producto($datos){

        global $conexion;

        try{

            $conexion->beginTransaction();

            $sql = "INSERT INTO productos
                    (
                        codigo,
                        nombre,
                        idbodega,
                        idsucursal,
                        idmoneda,
                        precio,
                        descripcion,
                        created_at
                    )
                    VALUES
                    (
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        NOW()
                    )";

            $stmt = $conexion->prepare($sql);

            $stmt->execute([
                $datos["codigo"],
                $datos["nombre"],
                $datos["bodega"],
                $datos["sucursal"],
                $datos["moneda"],
                $datos["precio"],
                $datos["descripcion"]
            ]);

            $idproducto = $conexion->lastInsertId();


            $sql = "INSERT INTO productos_materiales
                    (
                        idproducto,
                        idmaterial
                    )
                    VALUES
                    (
                        ?,
                        ?
                    )";

            $stmt = $conexion->prepare($sql);

            foreach($datos["material"] as $idmaterial){

                $stmt->execute([
                    $idproducto,
                    $idmaterial
                ]);

            }

            $conexion->commit();

            return true;

        }catch(PDOException $e){

            $conexion->rollBack();

            return $e->getMessage();

        }

    }



?>