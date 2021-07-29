<!DOCTYPE html>
<html lang="en">

<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>






<!--Contenido Principal-->
<div id="idprincipal">
<h1>Ultimas antradas</h1>


<?php
$entradas=listarUltimasEntradas($db);
if(!empty($entradas)):
while($entrada=mysqli_fetch_assoc($entradas)):
?>


<article class="entradas">
<a href="">
    <h2><?=$entrada['titulo']?></h2>
    <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha_reg']?></span>
    <p><?=substr($entrada['descripcion'],0,180)."..." ?></p>
    </a>
</article>

<?php
endwhile;
endif;
?>



<div id="idvertodas">
    <a href="">Ver todas las entradas</a>
</div>

</div>

<!--Contenido Principal End-->


<?php require_once 'includes/pie.php';?>


</body>
</html>
