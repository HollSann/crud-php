<?php
include 'conexion.php';
$id = $dbCon->real_escape_string(htmlentities($_GET['id']));
$select = $dbCon->query("SELECT * FROM inventario WHERE id='$id'");
if ($row = $select->fetch_assoc()) {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CRUD</title>
</head>

<body>
    <nav class="navbar navbar-light bg-primary">
        <a href="#" class="navbar-brand text-white ">Crud</a>
    </nav>
    <div class="container" style="padding-top:30px">

        <form action="actualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <input type="text" name="producto" placeholder="Producto" class="form-control" value="<?php echo $row['producto'] ?>">
            </div>
            <div class="form-group">
                <input type="number" name="precio" placeholder="Precio" class="form-control" value="<?php echo $row['precio'] ?>" step="0.01">
            </div>
            <div class="form-group">
                <input type="number" name="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $row['cantidad'] ?>">
            </div>
            <div class="form-group">
                <input type="text" name="categoria" placeholder="Categoria" class="form-control" value="<?php echo $row['categoria'] ?>">
            </div>

            <div class="form-group">
                <button type="submit" value="Editar" class="btn btn-info widht -100">Editar</button>
            </div>
        </form>
    </div>

</body>

</html>