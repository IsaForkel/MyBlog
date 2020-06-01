<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ValidadorLogin.inc.php';

if(isset($_POST['login'])){
    Conexion::abrir_conexion();

    $validador = new ValidadorLogin($_POST['email'],$_POST['clave'],Conexion::obtener_conexion());

    if($validador -> obtener_error() === '' && !is_null($validador -> obtener_usuario())){
        //iniciar Sesion
        //Redirigir al Index
        echo 'Inicio de Sesion OK';

    }else{

        echo 'Inicio de Sesion Fake';
    }

    Conexion::cerrar_conexion();
}

$tituloc = 'Login';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div id="titulo" class="panel text-center">
        <h1 class="text-center">Iniciar Sesion</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading  text-center">
                    <h3>Introduce tus Datos :v</h3  >
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="usuario@mail.com"
                            <?php
                                if(isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])){
                                    echo'value="'.$_POST['email'].'"';
                                }
                            ?>
                        required autofocus>
                        <br>
                        <label>Contraseña</label>
                        <input type="password" name="clave" class="form-control" required> 
                        <br>
                        <?php
                            if(isset($_POST['login'])){
                                $validador -> mostrar_error();
                            }
                        ?>
                        <button type="submit" name="login" class="btn btn-lg btn-default btn-block">
                            Iniciar Sesion
                        </button>
                    </form>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="#">¿Olvidaste tu Contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>