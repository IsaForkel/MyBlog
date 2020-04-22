<?php

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

Conexion::abrir_conexion();
$total_usuarios = RepositorioUsuario::obtener_numero_usuarios(Conexion::obtener_conexion());
Conexion::cerrar_conexion();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Blog</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
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
                            <img src="img/logo.png.png" class="img-responsive" style="width:40px !important; height:40px !important" alt="">
                        </li>
                        <li>
                            <a class="navbar-brand" href="#">JavaDevOne</a>
                        </li>
                    </ul>
                </div>
                <div id="navbar"  class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>  Entradas</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>  Favoritos</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>  Autores</a></li>
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
                            <a href="#">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Registro
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Blog de JavaDevOne</h1>
                <p>
                    Blog dedicado a: Lo que Pasa en INGUSAC :v
                </p>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    Búsqueda
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="search" class="form-control" placeholder="¿Que Buscas?">
                                    </div>
                                    <button class="form-control">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>
                                    Filtro
                                </div>
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                    Archivo
                                </div>
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            Ultimas Entradas
                        </div>
                        <div class="panel-body">
                            <p>Todavia no hay entradas que mostrar</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>