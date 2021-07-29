<?php

//Iniciar sesion y conexion con BBDD

require_once 'includes/conexion.php';

//Recoger datos del formulario
if (isset($_POST)) {

//Borrar sesion anterior

if(isset ($_SESSION['error_login'])) {
    session_unset($_SESSION['error_login']);
}

//recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];
}

//Consulta comprobar credenciales del usuario

$sql = "SELECT * FROM usuarios where email = '$email'";
$login = mysqli_query($db, $sql);
echo var_dump($login);

if ($login && mysqli_num_rows($login) == 1) {
    $usuario = mysqli_fetch_assoc($login);

    //Comparar contraseña
    $verify = password_verify($password, $usuario['password']);

    if ($verify) {
        //usar sesion para guardar usuario
        $_SESSION['usuario'] = $usuario;
     

    } else {
        //fallo
        $_SESSION['error_login'] = "Login incorrecto, Error 201";

    }

} else {

    //error
    $_SESSION['error_login'] = "Login incorrecto, Error 202";
    
}

//Utilizar sesion para salvar datos del usuario logeado

//Si algo falla enviar sesion con el fallo

//Redirigir al index

header('location:index.php');
