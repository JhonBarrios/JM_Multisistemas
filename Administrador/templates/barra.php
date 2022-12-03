<?php
include_once 'db.php';
?>

<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-color">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - FullScreen -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt padd"></i> <span class="ocultar"> Pantalla Completa
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="nav-icon fas fa-cogs padd"></i> <span class="ocultar"> Ajustes </span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="dropdown toggle nav-link" data-toggle="dropdown">
          <?php
          $datos="SELECT * FROM acceso_administrador";
          $consulta = mysqli_query($connexion,$datos);

          while($mostrar=mysqli_fetch_array($consulta)) {

            $nombre_usuario = $mostrar['Nombre'];
          ?>
          <span class="hidden-xs padd"> Hola <span class="ocultar">: <?php echo $nombre_usuario ?> </span></span>
          <?php } ?>
        </a>
        <ul class="dropdown-menu">
          <!-- Menu User Menu -->
          <li class="user-footer">
            <div class="pull-right">
              <a href="../" class="btn btn.default btn-flat"><i class="fas fa-power-off"></i> Cerrar Sesión </a>
            </div>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
  <!-- /.navbar
