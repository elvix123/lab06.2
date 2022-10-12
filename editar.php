<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select - from persona where id= ?;");
    $sentencia ->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5"> 
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:

                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="textNombre" required
                        value="<?php echo $persona->nombres; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Paterno: </label>
                        <input type="text" class="form-control" name="textApPaterno" autofocus required
                        value="<?php echo $persona->apellido_paterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Materno: </label>
                        <input type="text" class="form-control" name="textApMaterno" autofocus required
                        value="<?php echo $persona->apellido_materno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Nacimiento: </label>
                        <input type="text" class="form-control" name="textFechaNacimiento" autofocus required
                        value="<?php echo $persona->fecha_nacimiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="textCelular" autofocus required
                        value="<?php echo $persona->celular; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->id; ?>">
                        <input type="submit" class="btn btn-´primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include 'template/footer.php' ?>