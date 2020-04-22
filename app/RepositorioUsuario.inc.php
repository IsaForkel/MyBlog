<?php

class RepositorioUsuario{
    // Este metodo devolvera la cantidad de usuarios que existen en la Base de Datos
    //pero creando un objeto para cada Usario existente
    public static function obtener_todos($conexion){

        $usuarios = array();

        if(isset($conexion)){
            try {
                
                include_once 'Usuario.inc.php';
                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado  = $sentencia -> fetchAll();

                if (count($resultado)){
                    foreach ($resultado as $fila){
                        $usuarios[] = new Usuario(
                            $fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']
                        );
                    }
                }else{
                    print 'No hay Usuarios';
                }

            } catch (PDOException $ex) {
                print "Error" . $ex -> getMessage();
            }
        }
        return $usuarios;
    }

    //Este metodo retornara de una forma optima la cantidad de Usuarios 
    //que esxisten en la Base de Datos #SE UTILIZAN LAS CONSULTAS SQL.

    public static function obtener_numero_usuarios($conexion){
        $total_usuarios = null;

        if (isset($conexion)){
            try {
                $sql = "SELECT COUNT(*) as total FROM usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                $total_usuarios = $resultado['total'];

            } catch (PDOException $ex) {
                print "Error" . $ex -> getMessage();
            }
        }
        return $total_usuarios;
    }
}