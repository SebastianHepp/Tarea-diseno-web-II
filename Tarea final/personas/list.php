<?php
$res=mostrarTodos($link);
 ?>
 <h3>Personas</h3><a href="index.php?mod=new" class="btn btn-success">Nuevo</a><a href="json.php" target="new" class="btn btn-primary">JSON</a>
     <?php
     while ($data=mysqli_fetch_array($res))
     {
       include 'card.vw.php';
       //echo "<tr><td>".$data['cin'].
       //"</td><td>".$data['apellido']."</td><td>".$data['nombre']."</td><td>".$data['fenac']."</td><td>".$data['email']."</td><td>".nombreCiudad($link,$data['ciudad_id'])."</td><td><a href='index.php?mod=edit&id=".$data["id"]."'>editar</a></td><td><a href='index.php?mod=delete&id=".$data["id"]."'>borrar</a></td></tr>";
     }
      ?>
