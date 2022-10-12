<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])) {

    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['textNombres'];
    $apellido_paterno = $_POST['txtApPaterno'];
    $apellido_materno = $_POST['textApMaterno'];
    $fecha_nacimiento = $_POST['textFechaNacimiento'];
    $celular = $_POST['textCelular']:

    $sentencia = $bd->prepare("UPDATE persona SET nombres = ?, apellido_paterno = ?, apellido_materno = ?, fecha_nacimiento = ?, celular = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $celular, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }