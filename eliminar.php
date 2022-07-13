<?php
include 'conexion.php';

$id = htmlentities($_GET['id']);
// FORMA NORMAL
$del = $dbCon->query("DELETE from inventario WHERE id= '$id'");


//FORMA PREPARADA
$del = $dbCon->prepare("DELETE from inventario WHERE id= ?");
$del->bind_param('i', $id);

if ($del->execute()) {
    header("location:index.php");
} else {
    echo "No se pudo eliminar";
};
