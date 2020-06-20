<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Publicacion.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioPublicacion.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$tituloc = $publicacion->getTitulo();

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php echo $publicacion->getTitulo(); ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por:
                <a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <?php echo $autor -> getNombre();?>
                </a>
                el
                <?php echo $publicacion->getFecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?php echo nl2br($publicacion->getTexto()); ?>
            </article>
        </div>
    </div>
    <?php
        include_once 'plantillas/publicaciones_al_azar.inc.php';
    ?>
    <br>
    <?php
        if(count($comentarios) > 0){
            include_once 'plantillas/comentarios_publicacion.inc.php';
        }else{
            ?>
            <div class="text-center">
                Todavia no hay Comentarios!
            </div>
            <?php
        }
    ?>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>