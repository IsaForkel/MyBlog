<?php

Conexion::abrir_conexion();

?>

<div class="row">
    <div class="col-md-12">
        <button class="btn btn-default form-control" data-toggle="collapse" data-target="#comentarios">
            <?php echo "Ver Comentarios (" . count($comentarios) . ")"; ?>
        </button>
        <br>
        <br>
        <div id="comentarios" class="collapse">
            <?php
            for ($i = 0; $i < count($comentarios); $i++) {
                $comentario = $comentarios[$i];
            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                <?php
                                    $autor_comentario = RepositorioUsuario::obtener_nombre_usuario_por_id(Conexion::obtener_conexion(), $comentario->getAutorId());
                                    echo $autor_comentario;
                                 ?>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <?php echo $comentario->getAutorId(); ?>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        <?php echo $comentario->getFecha(); ?>
                                    </p>
                                    <p>
                                        <?php echo nl2br($comentario->getTexto()); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>