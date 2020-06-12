<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Publicacion.inc.php';

class RepositorioPublicacion{

    public static function insertar_publicacion($conexion, $publicacion){
        $publicacion_insertada = false;

        if(isset($conexion)){
            try{
                $sql = "INSERT INTO publicaciones(autor_id, titulo, texto, fecha, activa) 
                VALUES (:autor_id,:titulo,:texto,NOW(),0)";

                $sentencia = $conexion -> prepare($sql);
                $autor_id_temp = $publicacion -> getAutorId();
                $titulo_temp = $publicacion -> getTitulo();
                $texto_temp = $publicacion -> getTexto();
                $sentencia -> bindParam(':autor_id', $autor_id_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $titulo_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto_temp, PDO::PARAM_STR);

                $publicacion_insertada = $sentencia -> execute();

            }catch(PDOException $ex){
                print "Error" . $ex -> getMessage();
            }
        }

        return $publicacion_insertada;
    }

    public static function obtener_todas_por_fecha_descendiente($conexion){
        $publicaciones = [];
        if(isset ($conexion)){
            try {
                $sql = "SELECT * FROM publicaciones ORDER BY fecha DESC";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if(count($resultado)){
                    foreach($resultado as $fila){
                        $publicaciones[] = new Publicacion(
                            $fila['id'],
                            $fila['autor_id'],
                            $fila['titulo'],
                            $fila['texto'],
                            $fila['fecha'],
                            $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "Error".$ex -> getMessage();
            }
        }
        return $publicaciones;
    }
}