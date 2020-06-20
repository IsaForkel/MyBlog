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

    public static function obtener_comentarios($conexion, $publicacion_id){
        $comentarios = array();
        if(isset($conexion)){
                try {
                    include_once 'Comentario.inc.php';

                    $sql = "SELECT * FROM comentarios WHERE publicacion_id = :publicacion_id";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(':publicacion_id', $publicacion_id, PDO::PARAM_STR);
                    $sentencia -> execute();

                    $resultado = $sentencia -> fetchAll();

                    if(count($resultado)){
                        foreach($resultado as $fila){
                            $comentarios[] = new Comentario(
                                $fila['id'],
                                $fila['autor_id'],
                                $fila['publicacion_id'],
                                $fila['titulo'],
                                $fila['texto'],
                                $fila['fecha']
                            );
                        }
                    }
                } catch (PDOException $ex) {
                    echo '<p>¡Todavia no hay comentarios!</p>';
                }
        }
        return $comentarios;
    }
}