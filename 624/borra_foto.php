<?php
if (isset($_GET['foto']))
{
  $foto = $_GET['foto'];
  //$id = $_GET['id'];
  //echo "<br>".$foto."<br>";
  //echo $id."<br>";
  //echo "<br>".$foto."<br>";
}

 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Montironi</title>
    <link rel="icon"  type="image/png" href="car3.png"/>
    <link rel="icon" href="car.ico" type="image/x-icon">
<link rel="stylesheet" href="css/styles.css">
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
     
    </div> 
  </nav>
 
  <section class="bg-primary text-white">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!--<h4><strong>Precios actualizados</strong></h4>-->
         <h4><strong>Eliminar Foto?</strong></h4>
         
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
             <input hidden class="search_query form-control" type="text" name="key" id="key" value="<?php echo $foto; ?>">
             <input hidden class="search_query form-control" type="text" name="id" id="id" value="<?php echo $id; ?>">
             <button name="submit" type="submit" class="btn btn-light" style="margin-left:1em">Eliminar</button>

            <a href="index.php">
                <button type="button" style="background:#DE6B6C;color:white" class="btn btn-light" data_but="btn-xs">Cancelar</button>
            </a> 
         </form>
     
        
        <?php
        
        if (isset($_POST['submit'])){

          unlink($_POST['key']);
          $servidor_ftp = "montironi.dyndns.org";
          $conexion_id = ftp_connect($servidor_ftp);
          $ftp_usuario = "gerardo1";
          $ftp_clave = "gera1606";
          $resultado_login = ftp_login($conexion_id, $ftp_usuario, $ftp_clave);
          echo "<br>Foto original: ".$_POST['key'];
          echo "<br>Primer caracter: ".substr($_POST['key'],0,1);
          if (substr($_POST['key'],0,1) === 'f')
          {
            $foto_cortada = substr($_POST['key'],6);
            $pos = strpos($foto_cortada,'/');
            $numero_dir = substr($foto_cortada,0,$pos);
            $foto_final = substr($foto_cortada, $pos+1);
            echo "<br>Foto a borrar: ".$foto_final;
            echo "<br>Numero de directorio: ".$numero_dir;
            
            ftp_chdir($conexion_id, $numero_dir);      
            echo "<br>Estoy en: ".ftp_pwd($conexion_id);          
          }
          else 
          {
            $foto_cortada = $_POST['key'];
            $foto_final = $_POST['key'];
            $pos = strpos($foto_cortada,'__');
            $pos2 = strpos($foto_cortada,'_', $pos + 2);
            $numero_dir = substr($foto_cortada,$pos + 2, $pos2 - 3);
            echo "<br>Numero de directorio: ".$numero_dir;
            ftp_chdir($conexion_id, $numero_dir);      
            echo "<br>Estoy en: ".ftp_pwd($conexion_id);        
          }
          
          echo "<br>Foto Cortada: ".$foto_cortada;
          
          echo "<br> Posicion: ".$pos;
          //echo $pos;
         
          
          ftp_delete($conexion_id, $foto_final);
          ftp_close($conexion_id);   

          echo "<br><br>Foto eliminada";
          echo '<a href="index.php">
                <button type="button" style="background:#DE6B6C;color:white" class="btn btn-light" data_but="btn-xs">Volver</button>
            </a>';

       ?>


      
      </div>
       
   
  </section>
  <?php
    }
  ?>