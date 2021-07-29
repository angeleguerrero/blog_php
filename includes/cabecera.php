<?php require_once 'conexion.php' ?>
<?php require_once 'includes/helpers.php'?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Video Juegos</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
</head>
<body>

<header id="idcabecera">
<!--Cabecera-->
<div id="idlogo">
    <a href="index.php">
    Blog de Video Juegos
    </a>
</div>


<!--Menu-->


<nav id="idmenu">
<ul>
    <li>
        <a href="index.php">Inicio</a>
    </li>
    <?php 
    $categorias = listarCategorias($db); 
    if(!empty($categorias)):
  
     while ($categoria=mysqli_fetch_assoc($categorias)):
     ?>

    <li>
        <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
    </li>

        <?php 
      
        endwhile ;
        endif;
        ?>
    
    <li>
        <a href="index.php">Sobre mi</a>
    </li>

    <li>
        <a href="index.php">Contactos</a>
    </li>
</ul>
</nav>

<div class ="clearfix"></div>
</header>
<div id ="idcontenedor">