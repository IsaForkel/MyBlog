<?php

//Informacion de la BD
define('nombre_servidor', 'localhost:3307');
define('nombre_usuario','root');
define('password', 'wertyuk');
define('nombre_base_datos', 'blog');

//rutas de la web
define("servidor", "http://localhost/blog");
define("ruta_registro", servidor."/registro");
define("ruta_registro_correcto", servidor."/registro-correcto");
define("ruta_login", servidor."/login");
define("ruta_entradas", servidor."/entradas");
define("ruta_favoritos", servidor."/favoritos");
define("ruta_autores", servidor."/autores");
define("ruta_logout", servidor."/logout");
define("ruta_publicacion", servidor."/publicacion");
define("ruta_gestor", servidor."/gestor");
define("ruta_gestor_publicaciones", servidor."/gestor/publicaciones");
define("ruta_gestor_comentarios", servidor."/gestor/comentarios");
define("ruta_gestor_favoritos", servidor."/gestor/favoritos");

//recursos
define('ruta_css', servidor.'/css/');
define("ruta_cs", servidor."/css/");
define("ruta_js", servidor."/js/");
define("ruta_img", servidor.'/img/');