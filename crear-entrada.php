<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>
<!--Contenido Principal-->
<div id="idprincipal">
<h1>Crear nuevas entradas</h1>
<p>Añade nuevas entradas al blog para que los usuarios puedan leer el contenido que agregues</p>
<br>

<form action="guardar-entrada.php" method="POST">
<label for="titulo">Titulo</label>
<input type="text" name="titulo">

<label for="descripcion">Descripcion</label>
<textarea name="descripcion" id="" cols="30" rows="10"></textarea>

<label for="categoria">Descripcion</label>
<select name="categoria" id="">
<?php 
$categorias = listarCategorias($db);
if(!empty($categorias)):
while ($categoria = mysqli_fetch_assoc($categorias)):
?>


<option value="<?=$categoria['id']?>">
<?=$categoria['nombre']?>

</option>


<?php
endwhile;
endif;
?>

</select>



<input type="submit" value="Guardar">

</form>

</div>

<!--Contenido Principal End-->


<?php require_once 'includes/pie.php';?>