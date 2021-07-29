<?php require_once 'includes/helpers.php'?>

<!--Sidebar-Lateral-->
<aside id="idsidebar">

<?php if(isset($_SESSION['usuario'])):?>

<div id="usuario-logeado" class="bloque">
<h5>Bienvenido al Sistema: </h5>
<h4><?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']?></h4>
<a href="crear-entrada.php" class="boton-verde">Crear entradas</a>
<a href="crear-categoria.php" class="boton">Crear Categorias</a>
<a href="cerrar.php" class="boton-naranja">Editar perfil</a>
<a href="cerrar.php" class="boton-rojo">Cerrar sesion</a>


</div>
<?php endif; ?>

<!--Para ocultar sidebar despues de login--> 
<?php if(!isset($_SESSION['usuario'])):?>
<div id="login" class="bloque">
<h3>Identificate</h3>

<?php if(isset($_SESSION['error_login'])):?>
<div class="alerta alerta-error">
<?=$_SESSION['error_login'];?>
</div>
<?php endif; ?>




<form action="login.php" method="POST">

    <label for="email">Email</label>
    <input type="email" name="email">

    <label for="password">Contraseña</label>
    <input type="password" name="password">
    <input type="submit"name="submit" value="Acceder">
</form>
</div>


<div id="register" class="bloque">

<h3>Registrate</h3>

<?php if(isset($_SESSION['completado'])): ?>

<div class ="alerta alerta-exito">
    <?=$_SESSION['completado']?>
</div>

<?php elseif(isset($_SESSION['errores']['general'])) : ?>

    <div class ="alerta alerta-error">
    <?=$_SESSION['errores']['general']?>
    </div>


   <?php endif; ?>




<form action="registro.php" method="POST">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre') : '';?>

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido">
    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'apellido') : '';?>



    <label for="email">Email</label>
    <input type="email" name="email">
    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'email') : '';?>

    <label for="password">Contraseña</label>
    <input type="password" name="password">
    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'password') : '';?>

<input type="submit" name="submit" value="Registarse">

<?php borrarErrores();?>
</form>

</div>
<?php endif;?>
</aside>