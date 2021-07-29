<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>
<!--Contenido Principal-->
<div id="idprincipal">
<h1>Crear Categoria</h1>
<p>Añade nuevas categorias al blog para que los usuarios usen al crear las entradas</p>
<br>

<form action="guardar-categoria.php" method="POST">
<label for="nombre">Nombre Categoria</label>
<input type="text" name="nombre">

<input type="submit" value="Guardar">

</form>

</div>

<!--Contenido Principal End-->


<?php require_once 'includes/pie.php';?>