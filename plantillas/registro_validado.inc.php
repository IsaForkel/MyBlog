<div class="form-group">
    <label>Nombre de Usuario</label>
    <input type="text" class="form-control" name="nombre" placeholder="Usuario" <?php $validador->mostrar_nombre()?>>
    <?php
        $validador -> mostrar_error_nombre();
    ?>
</div>
<div class="form-group">    
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="usuario@mail.com" <?php $validador -> mostrar_email()?>>
    <?php
        $validador -> mostrar_error_email();
    ?>
</div>
<div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="clave1">
    <?php
        $validador -> mostrar_error_clave1();
    ?>
</div>
<div class="form-group">
    <label>Repita la Contraseña</label>
    <input type="password" class="form-control" name="clave2">
    <?php
        $validador -> mostrar_error_clave2();
    ?>
</div>
<br>
<div class="text-center">
    <button type="submit" class="btn btn-default" name="enviar">
        Registrar +
    </button>
    <button type="reset" class="btn btn-default">
        Limpiar Formulario
    </button>
</div>