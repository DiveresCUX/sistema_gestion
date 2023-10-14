<?php

    include('conexion.php');

    $accion = array();
    $err_sesion = array();

    $email = $_POST['email']; 
    $pass = $_POST['pass']; 

    $email =$connection->real_escape_string($email);
    $pass =$connection->real_escape_string($pass);

    $consulta = "SELECT * FROM usuarios WHERE email = '$email' AND pass = '$pass'";
    $resultado = mysqli_query($connection, $consulta);


    if ($resultado->num_rows> 0) {

        $accion = array(
            'url' =>['sistema.html']
        );

        $accion_sesion = json_encode($accion);
        echo $accion_sesion;

    }else{
        $err_sesion = array(
            'error' => ['Datos Incorrectos']
        );

        $error_sesion = json_encode($err_sesion);
        echo $error_sesion;
    }


    
?>