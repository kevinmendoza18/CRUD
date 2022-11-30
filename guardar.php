<?php
include_once('conexion.php');
$primer_nombre      = $_POST['primer_nombre'];
$segundo_nombre     = $_POST['segundo_nombre'];
$primer_apellido    = $_POST['primer_apellido'];
$segundo_apellido   = $_POST['segundo_apellido'];
$id_sexo            = $_POST['id_sexo'];
$id_ciudad          = $_POST['id_ciudad'];
$fecha_nacimiento   = $_POST['fecha_nacimiento'];

if (!isset($_POST['id'])) {
    $query = "INSERT INTO personas(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido,  id_sexo, id_ciudad, fecha_nacimiento) VALUES('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido',  '$id_sexo', '$id_ciudad', '$fecha_nacimiento')";
} else {
    $query = "UPDATE persona SET primer_nombre = '$primer_nombre', segundo_nombre = '$segundo_nombre', primer_apellido = '$primer_apellido', segundo_apellido = '$segundo_apellido',  id_sexo = '$id_sexo', id_ciudad = '$id_ciudad', fecha_nacimiento = '$fecha_nacimiento' WHERE id = {$_POST['id']}";
}

$result = mysqli_query($con, $query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <button class="btn btn-sm btn-outline-warning "> <a href="index.php">Volver</a></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>