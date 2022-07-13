<?php

include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $producto = $_POST['producto'];
    $precio = htmlentities($_POST['precio']); //elimina carateres extraño para no podes hacer consultas a la base de datos
    $cantidad = $dbCon->real_escape_string(htmlentities($_POST['cantidad']));
    $categoria = $dbCon->real_escape_string(htmlentities($_POST['categoria']));
    $id = $dbCon->real_escape_string(htmlentities($_POST['id']));
    // FORMA NORMAL PARA ACTUALIZAR POST
    // $up = $dbCon->query("UPDATE inventario SET producto ='$producto', precio='$precio', cantidad='$cantidad',categoria='$categoria' WHERE id='$id'");

    // FORMA PREPARADA
    $up = $dbCon->prepare("UPDATE inventario SET producto =?, precio=?, cantidad=?,categoria=? WHERE id=?");
    $up->bind_param("sdisi", $producto, $precio, $cantidad, $categoria, $id);

    if ($up->execute()) {
        echo "<cript>alert(Producto Guardado)</script>";
        header("location:index.php");
    } else {
        echo "No se editó";
    }

    $up->close();
    $dbCon->close();
} else {
    header("location:index.php");
}
