<?php

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if ($partes_ruta[0] == 'blog') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = "vistas/home.php";
    } else if (count($partes_ruta) == 2) {
        switch ($partes_ruta[1]) {
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                break;
            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;
            case 'relleno-dev':
                $ruta_elegida = 'script-relleno.php';
                break;
            default:
                $ruta_elegida = 'vistas/404.php';
        }
    } else if (count($partes_ruta) == 3) {
        if ($partes_ruta[1] == 'registro-correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }
        if ($partes_ruta[1] == 'publicacion') {
            $url = $partes_ruta[2];

            include_once 'app/config.inc.php';
            include_once 'app/Conexion.inc.php';

            include_once 'app/Usuario.inc.php';
            include_once 'app/Publicacion.inc.php';
            include_once 'app/Comentario.inc.php';

            include_once 'app/RepositorioUsuario.inc.php';
            include_once 'app/RepositorioPublicacion.inc.php';
            include_once 'app/RepositorioComentario.inc.php';

            Conexion::abrir_conexion();

            $publicacion = RepositorioPublicacion::obtener_entrada_por_url(Conexion::obtener_conexion(), $url);
            $publicaciones_al_azar = RepositorioPublicacion::obtener_entradas_al_azar(Conexion::obtener_conexion(),3);
            $comentarios = RepositorioComentario::obtener_comentarios(Conexion::obtener_conexion(), $publicacion->getId());

            if ($publicacion != null) {

                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $publicacion->getAutorId());
                $ruta_elegida = 'vistas/publicacion.php';
            }
        }
    }
}

include_once $ruta_elegida;
