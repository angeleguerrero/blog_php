<?php


if (isset($_POST)) {
    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
        session_start();

    }


    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre'])  : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db,$_POST['apellido'])  : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email'])  : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

/*Array para errores*/
    $errores = array();

/*Validar los datos*/

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {

        $nombre_validado = true;
  
    } else {

        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
       
    }


    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {

        $apellido_validado = true;
    } else {

        $apellido_validado = false;
        $errores['apellido'] = "El Apellido no es valido";
    }


    if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)) {

        $email_validado = true;
    } else {

        $email_validado = false;
        $errores['email'] = "El Email no es valido Error 1";
        var_dump($email);
    }



    if (!empty($password)) {

        $password_validado = true;
    } else {

        $password_validado = false;
        $errores['password'] = "El Password no es valido";
       
    }

    //var_dump($errores);

    $guardar_usuario=false;

    if (count($errores)==0){
    $guardar_usuario=true;

/*Cifrar contraseña*/
$password_segura=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);

//var_dump($password);
//var_dump($password_segura);
//var_dump (password_verify($password, $password_segura));

$sql="INSERT INTO usuarios VALUES(NULL, '$nombre','$apellido', '$email', '$password_segura', CURDATE())";
$guardar = mysqli_query($db,$sql);
//var_dump (mysqli_error($db));
//die();

if ($guardar){
$_SESSION['completado']='El registro se ha completado con exito';

}else{
    $_SESSION['errores']['general']='Fallo al insertar usuario';
}

//die();
/*Insertar Usuario*/ 

    }
    else{
     $_SESSION['errores']=$errores;

     header('location:index.php');

    }



}

header ('Location:index.php');