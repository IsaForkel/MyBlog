<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Publicacion.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioPublicacion.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$tituloc = 'Gestor de Usuario';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'plantillas/panel_control_declaracion.inc.php';

switch ($gestor_actual) {
    case '':
        Conexion::abrir_conexion();
        $cantidad_publicaciones_activas = RepositorioPublicacion::contar_publicaciones_activas_usuario(
            Conexion::obtener_conexion(),
            $_SESSION['id_usuario']
        );
        $cantidad_publicaciones_inactivas = RepositorioPublicacion::contar_publicaciones_inactivas_usuario(
            Conexion::obtener_conexion(),
            $_SESSION['id_usuario']
        );
        $cantidad_comentarios = RepositorioComentario::contar_comentarios_usuario(
            Conexion::obtener_conexion(),
            $_SESSION['id_usuario']
        );
        Conexion::cerrar_conexion();
        include_once 'plantillas/gestor-generico.inc.php';
        break;
    case 'publicaciones':
        include_once 'plantillas/gestor-publicaciones.inc.php';
        break;
    case 'comentarios':
        include_once 'plantillas/gestor-comentarios.inc.php';
        break;
    case 'favoritos':
        include_once 'plantillas/gestor-favoritos.inc.php';
        break;
}
//para activar el gestor actual
include_once 'plantillas/panel_control_cierre.inc.php';
include_once 'plantillas/documento-cierre.inc.php';
