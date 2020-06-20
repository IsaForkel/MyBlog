<?php
include_once 'app/RepositorioPublicacion.inc.php';
include_once 'app/Publicacion.inc.php';
class EscritorPublicaciones
{

    public static function escribir_publicaciones()
    {
        $publicaciones = RepositorioPublicacion::obtener_todas_por_fecha_descendiente(Conexion::obtener_conexion());

        if (count($publicaciones)) {
            foreach ($publicaciones as $publicacion) {
                self::escribir_publicacion($publicacion);
            }
        }
    }

    public static function escribir_publicacion($publicacion)
    {
        if (!isset($publicacion)) {
            return;
        }
?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Titulo: </strong>
                        <?php
                        echo $publicacion->getTitulo();
                        ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>
                                Fecha:
                                <?php
                                echo $publicacion->getFecha();
                                ?>
                            </strong>
                        </p>
                        <div class="text-justify">
                            <?php
                            echo nl2br(self::resumir_texto($publicacion->getTexto()));
                            ?>
                        </div>
                        <br>
                        <div class="text-right">
                            <a href="<?php echo ruta_publicacion . '/' . $publicacion->getUrl() ?>" class="btn btn-default" role="button">
                                Seguir Leyendo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }

    public static function resumir_texto($texto){
        $longitud_maxima = rand(400, 600);
        $resultado = '';
        if (strlen($texto) >= $longitud_maxima) {
            //forma iterativa de la reduccion de publicaciones
            /*
            for($i=0; $i<$longitud_maxima; $i++){
                $resultado .= substr($texto, $i, 1);
            }*/

            $resultado = substr($texto, 0, $longitud_maxima);

            $resultado .= '...';
        } else {
            $resultado = $texto;
        }
        return $resultado;
    }

    public static function resumir_texto_en_publicaciones($texto){
        $longitud_maxima = 400;
        $resultado = '';
        if(strlen($texto) >= $longitud_maxima){
            $resultado = substr($texto,0,$longitud_maxima);
            $resultado.='...';
        }else{
            $resultado = $texto;
        }
        return $resultado;
    }
}
