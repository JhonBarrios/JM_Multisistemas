<!--
/*****************************************************************/
/***** Sitio web diseñado por: Jhon Anderson Barrios Giraldo *****/
/*****************************************************************/
-->
<?php
    include("db.php");
?>

<!DOCTYPE html>
<html lang="es">
<!-- Inicio del Head del documento -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JM MULTISISTEMAS</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/glider.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <link type="image/png" href="../Imagenes/Logo_32x32.webp" rel="shortcut icon">
    <meta name="description" content="Compra en línea de manera fácil lo último en tecnología. Celulares, Computadores, Impresoras, Accesorios, Licencias y mucho más. 
    ¿No sabes cual es el ideal para ti? Asesórate con nosotros.">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/admin.css" />
</head>


<body id="body-font" style="background-image: url(img/mountain.jpg);background-size: 100%; background-repeat: no-repeat;background-position: center; background-attachment: scroll; background-size: cover">
  <div>
    <div class="administrador">
      
      <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center" id="template-bg-3">
        
      <form class="p-4 bg-dark bg-gradient text-white col-sm-6 col-md-3" action="Accesos.php" method="POST">
          
        <h2 class="text-center pb-4"> Usuario Administrador</h2>
        
        <div class="mb-3">
          <label for="Username" class="form-label">Nombre de Usuario</label>
          <input type="text" class="form-control" id="Username" name="user" placeholder="Nombre de Usuario">
        </div>

        <div class="mb-3">
          <label for="UserPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="UserPassword" name="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary" name="btningresar">Ingresar</button>
      </form>
    </div>
    <div class="end"></div>
  </div>
</body>
</html>
