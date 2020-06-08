<?php

//Informacion de la BD
define('nombre_servidor', 'localhost:3307');
define('nombre_usuario','root');
define('password', 'wertyuk');
define('nombre_base_datos', 'blog');

//rutas de la web
define("servidor", "http://localhost/blog");
define("ruta_registro", servidor."/registro.php");
define("ruta_registro_correcto", servidor."/registro-correcto.php");
define("ruta_login", servidor."/login.php");
define("ruta_entradas", servidor."/entradas.php");
define("ruta_favoritos", servidor."/favoritos.php");
define("ruta_autores", servidor."/autores.php");
define("ruta_logout", servidor."/logout.php");