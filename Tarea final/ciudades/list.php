<?php
$res=mostrarCiudades($link);
 ?>
 <h3>Ciudades</h3><a href="index.php?mod=new" class="btn btn-success">Nuevo</a><a href="json.php" target="new" class="btn btn-primary">JSON</a>
     <?php
     while ($data=mysqli_fetch_array($res))
     {
       include 'card.vw.php';
     }
      ?>
