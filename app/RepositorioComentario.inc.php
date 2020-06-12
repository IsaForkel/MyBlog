<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';

class RepositorioComentario{

    public static function insertar_comentario($conexion, $comentario){
        $comentario_insertado = false;

        if(isset($conexion)){
            try{
                $sql = "INSERT INTO comentarios(autor_id, publicacion_id, titulo, texto, fecha) 
                VALUES (:autor_id,:publicacion_id,:titulo,:texto,NOW())";

                $sentencia = $conexion -> prepare($sql);
                $autor_id_temp = $comentario -> getAutorId();
                $publicacion_id_temp = $comentario -> getPublicacionId();
                $titulo_temp = $comentario-> getTitulo();
                $texto_temp = $comentario -> getTexto();
                $sentencia -> bindParam(':autor_id', $autor_id_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':publicacion_id', $publicacion_id_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $titulo_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto_temp, PDO::PARAM_STR);

                $comentario_insertado = $sentencia -> execute();

            }catch(PDOException $ex){
                print "Error" . $ex -> getMessage();
            }
        }

        return $comentario_insertado;
    }
}