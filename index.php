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
           <a href="#" class="navbar-brand text-white ">Crud</a>
       </nav>
       <div class="container" style="padding-top:30px">
           <form action="guardar.php" method="post">
               <div class="form-group">
                   <input type="text" name="producto" placeholder="Producto" class="form-control" id="">
               </div>
               <div class="form-group">
                   <input type="number" name="precio" placeholder="Precio" class="form-control" id="" step="0.01">
               </div>
               <div class="form-group">
                   <input type="number" name="cantidad" placeholder="Cantidad" class="form-control" id="">
               </div>
               <div class="form-group">
                   <input type="text" name="categoria" placeholder="Categoria" class="form-control" id="">
               </div>

               <div class="form-group">
                   <button type="submit" value="Guardar" class="btn btn-info widht -100">Guardar</button>
               </div>
           </form>
       </div>
       <div class="container">

           <table class="table">
               <th>Producto</th>
               <th>Precio</th>
               <th>Cantidad</th>
               <th>Categoria</th>
               <?php while ($row = $select->fetch_assoc()) { ?>
                   <tr>
                       <td><?php echo $row['producto'] ?></td>
                       <td><?php echo "$" . number_format($row['precio'], 2) ?></td>
                       <td><?php echo $row['cantidad'] ?></td>
                       <td><?php echo $row['categoria'] ?></td>
                       <td><a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Editar</a></td>
                   </tr>
               <?php } ?>
           </table>
       </div>
   </body>

   </html>