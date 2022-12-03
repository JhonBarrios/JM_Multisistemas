<?php 
include_once 'templates/head.php';
?>
<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php
		include_once 'templates/barra.php';
		include_once 'templates/navegacion.php';
		?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
						<?php
					        $nombre="SELECT Nombre FROM acceso_administrador";
					        $consulta_name = mysqli_query($connexion,$nombre);
					        while($mostrardatos=mysqli_fetch_array($consulta_name)) {
				        ?>
							<h1>Bienvenido <span class="fw-bold"><?php echo $mostrardatos['Nombre'] ?></span> al perfil de administrador</h1>
						<?php
							}
						?>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
		</div>
		<!-- /.content-wrapper -->
		<?php
		include_once 'templates/footer.php';
		?>