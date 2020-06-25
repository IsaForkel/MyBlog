<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Publicacion.inc.php';

class RepositorioPublicacion
{

    public static function insertar_publicacion($conexion, $publicacion)
    {
        $publicacion_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO publicaciones(autor_id, url, titulo, texto, fecha, activa) 
                VALUES (:autor_id,:url,:titulo,:texto,NOW(),0)";

                $sentencia = $conexion->prepare($sql);
                $autor_id_temp = $publicacion->getAutorId();
                $url_temp = $publicacion->getUrl();
                $titulo_temp = $publicacion->getTitulo();
                $texto_temp = $publicacion->getTexto();
                $sentencia->bindParam(':autor_id', $autor_id_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':url', $url_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $titulo_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $texto_temp, PDO::PARAM_STR);

                $publicacion_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print "Error" . $ex->getMessage();
            }
        }

        return $publicacion_insertada;
    }

    public static function obtener_todas_por_fecha_descendiente($conexion)
    {
        $publicaciones = [];
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM publicaciones ORDER BY fecha DESC LIMIT 10";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $publicaciones[] = new Publicacion(
                            $fila['id'],
                            $fila['autor_id'],
                            $fila['url'],
                            $fila['titulo'],
                            $fila['texto'],
                            $fila['fecha'],
                            $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "Error" . $ex->getMessage();
            }
        }
        return $publicaciones;
    }

    public static function obtener_entrada_por_url($conexion, $url)
    {
        $publicacion = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM publicaciones WHERE url LIKE :url";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $publicacion = new Publicacion(
                        $resultado['id'],
                        $resultado['autor_id'],
                        $resultado['url'],
                        $resultado['titulo'],
                        $resultado['texto'],
                        $resultado['fecha'],
                        $resultado['activa'],
                    );
                }
            } catch (PDOException $ex) {
                print "Error" . $ex->getMessage();
            }
        }
        return $publicacion;
    }

    public static function obtener_entradas_al_azar($conexion, $limite)
    {
        $publicaciones = [];

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM publicaciones ORDER BY  RAND() LIMIT $limite";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $publicaciones[] = new Publicacion(
                            $fila['id'],
                            $fila['autor_id'],
                            $fila['url'],
                            $fila['titulo'],
                            $fila['texto'],
                            $fila['fecha'],
                            $fila['activa'],
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "Error" . $ex->getMessage();
            }
        }
        return $publicaciones;
    }

    public static function contar_publicaciones_activas_usuario($conexion, $id_usuario)
    {
        $total_publicaciones = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_publicaciones FROM publicaciones
                        WHERE autor_id =:autor_id AND activa = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_publicaciones = $resultado['total_publicaciones'];
                }
            } catch (PDOException $ex) {
                print "Error" . $ex->getMessage();
            }
        }
        return $total_publicaciones;
    }

    public static function contar_publicaciones_inactivas_usuario($conexion, $id_usuario)
    {
        $total_publicaciones = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_publicaciones FROM publicaciones
                        WHERE autor_id =:autor_id AND activa = 0";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_publicaciones = $resultado['total_publicaciones'];
                }
            } catch (PDOException $ex) {
                print "Error" . $ex->getMessage();
            }
        }
        return $total_publicaciones;
    }
}
