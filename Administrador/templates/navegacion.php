  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="img/Logo_V2.png" alt="JM Multisistemas Logo" class="brand-image">
      <span class="brand-text font-weight-light">JM Multisistemas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image align-self-center">
          <i class="fa-brands fa-buffer fa-xl" style="color: white;"></i>
        </div>
        <div class="info">
          <?php
          $datos="SELECT * FROM acceso_administrador";
          $consulta = mysqli_query($connexion,$datos);

          while($mostrar=mysqli_fetch_array($consulta)) {

            $nombre_usuario = $mostrar['Nombre'];
          ?>
          <a href="#" class="d-block"><?php echo $nombre_usuario ?></a>
          <?php } ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">ADMINISTRACIÓN</li>

          <!-- Seccion del Equipo -->
          <li class="nav-item">
            <a href="SomosJM.php" class="nav-link">
              <i class="nav-icon fa-solid fa-user-tie"></i>
              <p>
                Somos JM
              </p>
            </a>
          </li>

          <!-- Seccion de la tienda -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-cart-arrow-down"></i>
              <p>
                Tienda
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Tienda_List.php" class="nav-link">
                  <i class="fa-solid fa-cart-shopping nav-icon"></i>
                  <p>Lista de la Tienda</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Tienda_Subir.php" class="nav-link">
                  <i class="fa-solid fa-circle-check nav-icon"></i>
                  <p>Subir item a la Tienda</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-trash-can nav-icon"></i>
                  <p>Eliminar item de la tienda</p>
                </a>
              </li>
            </ul>

          </li>

          <!-- Seccion del Blog -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Blog_List.php" class="nav-link">
                  <i class="far fa-file-image nav-icon"></i>
                  <p>Lista de Blogs</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Blog_Subir.php" class="nav-link">
                  <i class="far fa-solid fa-circle-check nav-icon"></i>
                  <p>Subir Blog</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Blog_Borrar.php" class="nav-link">
                  <i class="far fa-solid fa-trash-can nav-icon"></i>
                  <p>Eliminar Blog</p>
                </a>
              </li>
            </ul>

          </li>

          <!-- Seccion de Nosotros ->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Nosotros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="mod_junta.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Junta Directiva</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mod_dir-generalD.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Dir. General - Director</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mod_dir-general.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Dir. General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mod_com-tecnico.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Comité Tecnico</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mod_dir-estrategico.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Dir. Estrategico</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mod_resena.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Reseña Historica</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- Seccion de la Certificación ADR ->
          <li class="nav-item">
            <a href="mod_certificacion_adr.php" class="nav-link">
              <i class="nav-icon far fa-registered"></i>
              <p>
                Certificación ADR
              </p>
            </a>
          </li> -->

          <!-- Seccion de Informes de Gestión ->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Inf. de Gestión
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="inf_list.php" class="nav-link" id="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Listar Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inf_new.php" class="nav-link" id="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inf_update.php" class="nav-link" id="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Modificar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inf_delete.php" class="nav-link" id="nav-link">
                  <i class="far fa-window-close nav-icon"></i>
                  <p>Eliminar</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- Seccion de Noticias ->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Sección Noticias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new_noticias.php" class="nav-link" id="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>Nueva Noticia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mod_noticias.php" class="nav-link" id="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Modificar Noticia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="del_noticias.php" class="nav-link" id="nav-link">
                  <i class="far fa-window-close nav-icon"></i>
                  <p>Eliminar Noticia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="btns_noticias.php" class="nav-link" id="nav-link">
                  <i class="fas fa-circle-notch nav-icon"></i>
                  <p>Botones</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- Seccion de Suscripciones -->
          <li class="nav-item">
            <a href="Suscripciones.php" class="nav-link">
              <i class="nav-icon fa-solid fa-bullhorn"></i>
              <p>
                Suscripciones
              </p>
            </a>
          </li>

          <!-- Seccion del Equipo -->
          <li class="nav-item">
            <a href="listar_equipo.php" class="nav-link">
              <i class="nav-icon fa-solid fa-people-group"></i>
              <p>
                Equipo
              </p>
            </a>
          </li>

          <!-- Seccion del Equipo -->
          <li class="nav-item">
            <a href="Clientes.php" class="nav-link">
              <i class="nav-icon fa-solid fa-user-tie"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>

          <!-- Seccion de Contacto -->
          <li class="nav-item">
            <a href="mod_contactanos.php" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Contáctanos
              </p>
            </a>
          </li>

          <!-- Seccion de Administradores -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Administradores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>Agregar Adm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-trash-alt nav-icon"></i>
                  <p>Eliminar Adm</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="mod_adm.php" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Modificar Adm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listar_adm.php" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Listar Adm</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
