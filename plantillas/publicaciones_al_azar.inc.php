<?php
include_once 'app/EscritorPublicaciones.inc.php';
?>
<div class="row">
    <div class="col-md-12">
        <hr>
        <h3>Otras Publicaciones Interesantes: </h3>
    </div>
    <?php
        for($i=0; $i<count($publicaciones_al_azar); $i++){
            $publicacion_actual = $publicaciones_al_azar[$i];
    ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $publicacion_actual->getTitulo(); ?>
                </div>
                <div class="panel-body">
                    <p>
                        <?php echo EscritorPublicaciones::resumir_texto_en_publicaciones(nl2br($publicacion_actual->getTexto()));?>
                    </p>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    <div class="col-md-12">
        <hr>
    </div>
</div>