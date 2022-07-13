<?php

include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $producto = $_POST['producto'];
    $precio = htmlentities($_POST['precio']); //elimina carateres extraño para no podes hacer consultas a la base de datos
    $cantidad = $dbCon->real_escape_string(htmlentities($_POST['cantidad']));
    $categoria = $dbCon->real_escape_string(htmlentities($_POST['categoria']));
    $id = '';
    //Guardar cambios del formulario
    // //Consulta completa
    // $insertar = $dbCon->query("INSERT INTO inventario(id,producto,cantidad,precio,categoria) VALUES (DEFAULT,'$producto','$precio','$cantidad','$categoria')");

    //consulta preparada(LA MEJOR)
    $insertar = $dbCon->prepare("INSERT INTO inventario VALUES (?,?,?,?,?)");
    $insertar->bind_param("isdis", $id, $producto, $precio, $cantidad, $categoria);
    if ($insertar->execute()) {
        echo "<cript>alert(Producto Guardado)</script>";
        header("location:index.php");
    } else {
        echo "No guardó";
    }

    $insertar->close();
    $dbCon->close();
} else {
    header("location:index.php");
}
