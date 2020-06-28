<div id="gestor-pub" class="row panel-heading titulo text-center">
    <div class="col-md-12">
        <h1>
            <svg class="bi bi-folder-fill" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
            </svg>
            <u><strong>Gestion de Publicaciones</strong> </u>
        </h1>
    </div>
    <br>
</div>
<div class="row">
    <a href="<?php echo ruta_nueva_publicacion ?>" class="btn btn-primary btn-lg" role="button" id="boton-nueva-publicacion">
        <svg class="bi bi-plus-square-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z" />
        </svg>
        Nueva Publicacion
    </a>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <?php
        if (count($array_publicaciones) > 0) {
        ?>
            <table id="tabla-publicacion" class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($array_publicaciones); $i++) {
                        $entrada_actual = $array_publicaciones[$i][0];
                        $comentarios_entrada_actual = $array_publicaciones[$i][1];
                    ?>
                        <tr>
                            <td><?php echo $entrada_actual->getFecha(); ?></td>
                            <td><?php echo $entrada_actual->getTitulo(); ?></td>
                            <td>
                                <?php
                                if (($entrada_actual->getActiva()) == 0) {
                                    echo 'Inactiva';
                                } else {
                                    echo 'Activa';
                                }
                                ?>
                            </td>
                            <td><?php echo $comentarios_entrada_actual; ?></td>
                            <td>
                                <button type="button" class="btn btn-xs">Editar</button>
                                <button type="button" class="btn btn-xs">Borrar</button>
                                <a href="<?php echo ruta_publicacion .'/'. $entrada_actual->getTitulo() ?>" class="btn btn-xs ir-publicacion" role="button">
                                    Ir
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        <?php
        } else {
        ?>
            <h3>Todavia no has escrito ninguna Publicacion</h3>
        <?php
        }
        ?>
        < </div> </div>