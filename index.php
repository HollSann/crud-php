   <?php
    include 'conexion.php';
    $select = $dbCon->query("SELECT id,producto,precio,cantidad,categoria FROM inventario")

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
           <a href="#" class="navbar-brand text-white h1 ">Crud</a>
       </nav>
       <div class="container" style="padding-top:30px">
           <form action="guardar.php" method="post">
               <div class="form-group">
                   <label class="h5">Producto</label>
                   <input type="text" name="producto" placeholder="Nombre del producto" class="form-control" id="">
               </div>
               <div class="form-group">
                   <label class="h5">Precio</label>
                   <input type="number" name="precio" placeholder="Precio del producto" class="form-control" id="" step="0.01">
               </div>
               <div class="form-group">
                   <label class="h5">Cantidad</label>
                   <input type="number" name="cantidad" placeholder="Ingrese la cantidad" class="form-control" id="">
               </div>
               <div class="form-group">
                   <label class="h5">Categoria</label>
                   <input type="text" name="categoria" placeholder="Categoria del producto" class="form-control" id="">
               </div>

               <div class="form-group">
                   <button type="submit" value="Guardar" class="btn btn-info widht -100">Guardar</button>
               </div>
           </form>
       </div>
       <div class="container">

           <table class="table">

               <th class="text-primary">Producto</th>
               <th class="text-primary">Precio</th>
               <th class="text-primary">Cantidad</th>
               <th class="text-primary">Categoria</th>

               <?php while ($row = $select->fetch_assoc()) { ?>
                   <tr>
                       <td require><?php echo $row['producto'] ?></td>
                       <td require><?php echo "$" . number_format($row['precio'], 2) ?></td>
                       <td require><?php echo $row['cantidad'] ?></td>
                       <td require><?php echo $row['categoria'] ?></td>
                       <td><a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Editar</a></td>
                       <td><a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></td>
                   </tr>
               <?php } ?>
           </table>
       </div>
   </body>

   </html>