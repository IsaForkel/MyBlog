<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Publicacion.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioPublicacion.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::abrir_conexion();

for($usuarios = 0; $usuarios < 100; $usuarios++){
    $nombre = sa(10);
    $email = sa(5).'@'.sa(3);
    $password = password_hash('123456', PASSWORD_DEFAULT);

    $usuario = new Usuario('',$nombre, $email, $password,'','');
    RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(),$usuario);
}

for($publicaciones = 0; $publicaciones < 100; $publicaciones++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1,100);

    $publicacion = new Publicacion('',$autor, $titulo, $texto, '', '');
    RepositorioPublicacion::insertar_publicacion(Conexion::obtener_conexion(), $publicacion);
}

for($comentarios = 0; $comentarios < 100; $comentarios++){
    $titulo = sa(10);
    $texto = lorem2();
    $autor = rand(1,100);
    $publicacion = rand(1,100);

    $comentario = new Comentario('', $autor, $publicacion, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);;
}

function sa($longitud){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numeros_caracteres = strlen($caracteres);
    $string_aleatorio='';

    for($i=0; $i<$longitud; $i++){
        $string_aleatorio.=$caracteres[rand(0,$numeros_caracteres-1)];
    }
    return $string_aleatorio;
}

function lorem(){
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris facilisis imperdiet viverra. Maecenas ullamcorper elit gravida, efficitur sapien et, dapibus ligula. Proin consequat massa eget nulla pulvinar, a molestie leo iaculis. Cras nisl ipsum, consectetur eget dapibus vitae, ultricies id arcu. Quisque tempor ligula sit amet libero iaculis, at gravida odio volutpat. Sed ultricies maximus ornare. Fusce tincidunt, velit et congue viverra, diam felis volutpat ex, ac varius nisl elit id enim. Ut porttitor nunc urna.
    
    Pellentesque imperdiet rhoncus pharetra. Nam ullamcorper ultrices augue, eget finibus tortor ultrices vitae. Phasellus sem arcu, sollicitudin vitae mi non, dapibus pellentesque odio. Vestibulum sit amet odio id nunc pharetra blandit. Sed a hendrerit massa. Nam nibh ex, luctus sit amet libero non, mattis ullamcorper neque. Donec tincidunt sagittis ornare. Donec quis porttitor purus, vitae interdum mi. Nunc condimentum augue vitae ornare porta. Curabitur iaculis sit amet risus a mollis. Sed id enim arcu.
    
    Donec pharetra sollicitudin diam at finibus. Praesent aliquam sollicitudin ornare. Curabitur tellus dui, scelerisque a pretium sed, varius in nisl. Donec vestibulum mattis sollicitudin. Donec a nisi vitae metus vulputate pellentesque id mollis enim. Phasellus fringilla sollicitudin arcu, a fringilla ipsum tristique id. Duis a mi sed ligula pretium convallis. Donec venenatis semper mi ac commodo. Morbi euismod felis viverra, dictum dolor ut, porta nisi. Nullam vitae orci malesuada elit pretium ultrices id id mauris. Nam nec venenatis diam. Vestibulum sodales ipsum vitae velit molestie malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. In a hendrerit mauris. Nam faucibus bibendum ex, vel posuere leo blandit sed. Morbi at blandit neque.
    
    Sed congue vitae mauris mattis sodales. Nullam eros mi, dignissim ac porta id, lacinia a mi. Sed at sapien eu quam fermentum elementum. Sed bibendum facilisis bibendum. Nullam rhoncus tellus eu eros hendrerit elementum. Phasellus facilisis lorem eu quam maximus, vel egestas purus ultrices. Sed ultrices porttitor erat, sit amet molestie dui commodo in. Duis vel nisi arcu. Aliquam ornare purus vitae risus ullamcorper finibus. Nam venenatis quam eget nisi molestie, aliquam bibendum felis tincidunt.
    
    Integer pulvinar purus est, sit amet luctus orci molestie sit amet. Fusce dapibus leo lectus, sed condimentum ligula tempor ut. Sed pulvinar gravida dui, vitae rhoncus orci pretium non. In efficitur leo quis placerat lobortis. Phasellus eget interdum lacus. Pellentesque sit amet vehicula est. Aliquam pulvinar sollicitudin erat, id sollicitudin urna accumsan id. Etiam ultrices nec quam sed pharetra. Aenean sodales faucibus mattis. ';
    return $lorem;
}

function lorem2(){
    $lorem = 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.';
    return $lorem;
}
