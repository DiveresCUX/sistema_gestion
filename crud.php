<?php

    include('conexion.php');


    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $tarea = $_POST['tarea'];
    $problema = $_POST['problema'];

    $err_form = [];

    if (empty($nombre)) {
        $err_form[] = 'Debe ingresar nombre'    ;
    }

    if(empty($telefono)){
        $err_form []= 'Debe ingresar telefono';
    }

    if(empty($tarea)){
        $err_form[] = 'Debe ingresar tarea';
    }

    if(empty($problema)){
        $err_form[] = 'Debe ingresar una descripción';
    }

    if (!empty($err_form) ) {
        $errores = json_encode($err_form);
        echo $errores;
    }
    
    
    if (empty($err_form)) {
        
        $nombre = $connection->real_escape_string($nombre);
        $telefono = $connection->real_escape_string($telefono);
        $tarea = $connection->real_escape_string($tarea);
        $problema = $connection->real_escape_string($problema);
    
        $consulta = "INSERT INTO tareas (nombre, telefono, tarea, problema) VALUES ('$nombre', '$telefono', '$tarea', '$problema')";
        $resultado = mysqli_query($connection, $consulta);
    
        if ($resultado) {
            echo json_encode(['success' => 'Datos guardados con éxito']);
        } 
    }

?>