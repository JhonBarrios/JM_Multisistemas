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
						<div class="col-sm-8">
							<h1>Modificar Contáctanos</h1>

							<table class="tabla-administrador tabla-administrador-peq">
								<thead>
									<th>Correo Autorizado</th>
									<th>Actualizar Correo</th>
								</thead>
								<tbody>
									<?php
										$datos1="SELECT * FROM contacto";
										$consulta_contact = mysqli_query($connexion,$datos1);
										while($mostrardatos=mysqli_fetch_array($consulta_contact)) {
									?>
									<form class="" action="Accesos.php" method="POST">
									<tr>
										<td><input type="text" name="New_Correo" maxlength="60" value="<?php echo $mostrardatos['Correo_Autorizado'] ?>"></td>
										<td><button class="btn btn-info col-md-offset-9" type="submit" name="actualizar_contact">Modificar</button></td>
									</tr>
									</form>
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
