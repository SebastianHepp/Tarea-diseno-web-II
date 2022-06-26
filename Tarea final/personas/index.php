<?php
require('../libs/conex.php');
require('../libs/ciudades.lib.php');
require('../libs/personas.lib.php');
$link=conectar();
//print_r($_POST);
//print_r($_GET);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Personas</title>
     <link rel="stylesheet" href="/dw2_2022/node_modules/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
     <?php
      include('../libs/menu.php');
      ?>
     <div class="container">


     <?php
      $errores=[];
      $error=0;
      if (!($_POST) && !($_GET))
      {
        include('list.php');
      }
        elseif ($_GET['mod']=="new")
        {
          $ciudades=mostrarCiudades($link);
          include('form.php');
        }
        elseif ($_GET['mod']=="edit")
        {
        if ($_GET['id'])
        {
          $ciudades=mostrarCiudades($link);
          $res=mostrarPorId($link,$_GET['id']);
          include('form.php');
        }
        }
        elseif ($_GET['mod']=="delete")
        {
            if ($_GET['id']) {
              borrarPersona($link,$_GET);
              include('list.php');
              // code...
            }

        }elseif ($_POST) {
          // code...
          if ($_POST['id']==-1)
          {
            if ($_POST['cin']==""){
                $error++;
                array_push($errores,"El nro de cèdula no debe estar vacio");
                print_r($errores);
            }
            if ($_POST['nombre']=="")
            {
              $error++;
              array_push($errores,"El nombre no debe estar vacio");
              print_r($errores);
            }
            if ($_POST['apellido']=="")
            {
              $error++;
              array_push($errores,"El apellido no debe estar vacio");
              print_r($errores);
            }
            $nfecha=date_parse($_POST['fenac']);
            if ($nfecha['error_count'] )
             {
               $error++;
               array_push($errores,"la fecha debe ser valida ");
               print_r($errores);
             }
             if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                 $error++;
                 array_push($errores,"el email debe ser valido ");
                 print_r($errores);
             }
            elseif($error==0){
              $salida= agregarPersona($link,$_POST);
              include('list.php');
            }
            //echo $salida;
          } 











          //-------------------------------------------------------
          elseif ($_POST['id']!='') {
              if ($_POST['cin']==""){
                $error++;
                array_push($errores,"El nro de cèdula no debe estar vacio");
                print_r($errores);
              }
              if ($_POST['nombre']=="")
              {
                $error++;
                array_push($errores,"El nombre no debe estar vacio");
                print_r($errores);
              }
              if ($_POST['apellido']=="")
              {
                $error++;
                array_push($errores,"El apellido no debe estar vacio");
                print_r($errores);
              }
              $nfecha=date_parse($_POST['fenac']);
              if ($nfecha['error_count'] )
               {
                 $error++;
                 array_push($errores,"la fecha debe ser valida ");
                 print_r($errores);
               }
               if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                   $error++;
                   array_push($errores,"el email debe ser valido ");
                   print_r($errores);
               }
              elseif($error==0){
                $salida= editarPersona($link,$_POST);
                include('list.php');
              }    
          }
        }

      ?>
     </div>
<script type="text/javascript" src="/dw2_2022/node_modules/bootstrap/dist/js/bootstrap.js">

</script>
   </body>
 </html>
