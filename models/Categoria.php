<?php

# INCLUIMOS LA CONEXION 
include_once __DIR__ . '/../config/conexion.php';

class Categoria
{
    # Obtener todas las categorias
    static public function get_categoria()
    {
        $sql = "SELECT * FROM tm_categoria WHERE est = 1";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $retorno = [];
        }
        $stmt->closeCursor();

        return $retorno;
    }

    # Obtener todas las categorias por id
    static public function get_categoria_x_id($cat_id)
    {
        $sql = "SELECT * FROM tm_categoria WHERE est = 1 AND cat_id = :cat_id";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":cat_id", $cat_id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $retorno = ['error' => 'categoria no existente'];
        }
        $stmt->closeCursor();

        return $retorno;
    }

    # Insertar nueva categoria
    static public function insert_categoria($cat_nom, $cat_obs)
    {
        $sql = "INSERT INTO tm_categoria (cat_nom,cat_obs) VALUES (:cat_nom,:cat_obs)";
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":cat_nom", $cat_nom, PDO::PARAM_STR);
        $stmt->bindParam(":cat_obs", $cat_obs, PDO::PARAM_STR);;

        # ULTIMO ID
        if ($stmt->execute()) {
            # Retornamos el ultimo id
            $retorno = $conexion->lastInsertId();
        } else {
            $retorno = ['error' => 'Error al insertar en la base de datos'];
        }


        $stmt->closeCursor();

        return $retorno;
    }

    # Actualizar categoria
    static public function update_categoria($cat_nom, $cat_obs, $est, $cat_id)
    {
        $sql = "UPDATE tm_categoria SET cat_nom = :cat_nom, cat_obs = :cat_obs, est =:est WHERE cat_id = :cat_id";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":cat_nom", $cat_nom, PDO::PARAM_STR);
        $stmt->bindParam(":cat_obs", $cat_obs, PDO::PARAM_STR);
        $stmt->bindParam(":est", $est, PDO::PARAM_INT);
        $stmt->bindParam(":cat_id", $cat_id, PDO::PARAM_INT);
        $stmt->execute();

        # VALIDAMOS EL NUMERO DE FILAS AFECTADAS EN LA ACTUALIZACION
        if ($stmt->rowCount() > 0) {
            $retorno = ['ok' => 'Update Correcto'];
        } else {
            $retorno = ['error' => 'Error al actualizar el registro en la DB'];
        }


        $stmt->closeCursor();

        return $retorno;
    }

    # Actualizar categoria
    static public function delete_update_categoria($cat_id)
    {
        $sql = "UPDATE tm_categoria SET est = 0 WHERE cat_id = :cat_id";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":cat_id", $cat_id, PDO::PARAM_INT);
        $stmt->execute();

        # VALIDAMOS EL NUMERO DE FILAS AFECTADAS EN LA ACTUALIZACION
        if ($stmt->rowCount() > 0) {
            $retorno = ['ok' => 'Delete Correcto'];
        } else {
            $retorno = ['error' => 'Error al eliminar el registro en la DB'];
        }


        $stmt->closeCursor();

        return $retorno;
    }
}

// var_dump( Categoria::get_categoria());
