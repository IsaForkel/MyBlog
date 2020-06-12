<?php
include_once 'app/RepositorioPublicacion.inc.php';
include_once 'app/Publicacion.inc.php';
class EscritorPublicaciones{
    
    public static function escribir_publicaciones(){
        $publicaciones = RepositorioPublicacion::obtener_todas_por_fecha_descendiente(Conexion::obtener_conexion());

        if(count($publicaciones)){
            foreach($publicaciones as $publicacion){
                self::escribir_publicacion($publicacion);
            }
        }
    }

    public static function escribir_publicacion($publicacion){
        if(!isset($publicacion)){
            return;
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                            echo $publicacion -> getTitulo();
                        ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>
                                <?php
                                    echo $publicacion -> getFecha();
                                ?>
                            </strong>
                        </p>
                        <?php
                            echo nl2br($publicacion -> getTexto());
                        ?>
                    </div>
                </div>
            </div> 
        </div>

        <?php
    }
}