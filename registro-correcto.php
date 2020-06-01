<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

//Capturar datos desde el GET

if(isset($_GET['nombre']) && !empty($_GET['nombre'])){
    $nombre = $_GET['nombre'];
}else{
    Redireccion::redirigir(servidor);
}

$tituloc = 'Registro Correcto!!!';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>  Registro Correcto</b>
                </div>
                <div class="panel-body text-center">
                    <p>¡Gracias por Registrarte <b><?php echo $nombre ?></b>!</p>
                    <br>
                    <p><a href="<?php echo ruta_login ?>">Inicia Sesión</a> para comenzar a usar tu cuenta.</p>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
