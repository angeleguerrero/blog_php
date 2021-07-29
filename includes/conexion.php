<?php

$_SERVER='localhost';
$DATABASE='BLOG_MASTER';
$USERNAME='administrador';
$PASSWORD='Acceso2020*';

$db=mysqli_connect($_SERVER, $USERNAME,$PASSWORD,  $DATABASE);

mysqli_query($db, "SET NAMES 'utf8'"); 


/*INICIAR LA SESION*/ 

if(!isset($_SESSION)){
    session_start();
    }

?>