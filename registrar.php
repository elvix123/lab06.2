<?php

 include_once 'model/conexion.php';
 $nombres = $_POST["txtNombres"];
 $ap_paterno = $_POST["txtApPaterno"];
 $ap_materno = $_POST["txtApMaterno"];
 $fecha_nacimiento = $_POST["txtFechaNacimiento"];
 $celular = $_POST["txtCelular"];

 $sentencia = $bd->prepare("INSERT INTO persona(nombres,apellido_paterno,apellido_materno,fecha_nacimiento,celular) VALUES (?,?,?,?,?);");

 $resultado = $sentencia->execute([$nombres, $ap_paterno, $ap_materno, $fecha_nacimiento, $celular]);

 if($resultado == TRUE) {
    header('Location: index.php');

 }else {
    echo('error');
 }
?>