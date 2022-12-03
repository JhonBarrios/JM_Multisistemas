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
							<h1>Información del Administrador</h1>
							<table class="tabla-administrador tabla-administrador-peq">
								<thead>
									<th>Item</th>
									<th>Valor</th>
								</thead>
								<tbody class="text-left">
									<?php
				          $datos="SELECT * FROM acceso_administrador";
				          $consulta2 = mysqli_query($connexion,$datos);

				          while($mostrardatos=mysqli_fetch_array($consulta2)) {
				          ?>
									<tr>
										<td>Id de Administrador</td>
										<td><?php echo $mostrardatos['ID_Admin'] ?></td>
									</tr>

									<tr>
										<td>Nombre</td>
										<td><?php echo $mostrardatos['Nombre'] ?></td>
									</tr>

									<tr>
										<td>Usuario</td>
										<td><?php echo $mostrardatos['Usuario'] ?></td>
									</tr>

									<tr>
										<td>Contraseña</td>
										<td><?php echo $mostrardatos['Contraseña'] ?></td>
									</tr>

									<tr>
										<td>Correo</td>
										<td><?php echo $mostrardatos['Correo'] ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
		</div>
		<!-- /.content-wrapper -->
		<?php
		include_once 'templates/footer.php';
		?>
