<?php
Conexion::abrir_conexion();
$total_usuarios = RepositorioUsuario::obtener_numero_usuarios(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
?>


<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Este boton despliega la barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav nav-pills navbar-left navbar-brand">
                <li>
                    <img src="img/logo.png.png" class="img-responsive" style="width:57px !important; height:57px !important" alt="">
                </li>
                <li>
                    <a class="navbar-brand" href="#">JavaDevOne</a>
                </li>
            </ul>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Entradas</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Favoritos</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Autores</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <?php
                        echo $total_usuarios;
                        ?>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                        Iniciar Sesion
                    </a>
                </li>
                <li>
                    <a href="registro.php">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        Registro
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>