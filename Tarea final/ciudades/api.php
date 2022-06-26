<?php
require_once('../libs/conex.php');
require_once('../libs/ciudades.lib.php');
$link=conectar();
//print_r($_POST);
//print_r($_GET);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Ciudades</title>
          <link rel="stylesheet" href="/dw2_2022/node_modules/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
     <?php
     	//include('../libs/menu.php')
      ?>
      <div class="container">



     <?php
      if (!($_POST) && !($_GET))
      {
        include('json.php');
      }
        elseif ($_GET['mod']=="new")
        {
          //include('form.php');
        }
        elseif ($_GET['mod']=="edit")
        {
        if ($_GET['id'])
        {
          $res=mostrarCiudad($link,$_GET['id']);
          //include('form.php');
        }
        }
        elseif ($_GET['mod']=="delete")
        {
            if ($_GET['id']) {
              borrarCiudad($link,$_GET);
              //include('json.php');
              // code...
            }

        }elseif ($_POST) {
          // code...
          if ($_POST['id']==-1)
          {
            $salida= agregarCiudad($link,$_POST);
           // include('json.php');
            //echo $salida;
          } elseif ($_POST['id']!='') {
            $salida= editarCiudad($link,$_POST);
            //include('json.php');
          }
        }

      ?>
      </div>

   </body>
 </html>
