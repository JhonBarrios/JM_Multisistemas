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
							<h1>Información del Equipo de trabajo</h1>
							<table class="tabla-administrador tabla-administrador-peq">
								<thead>
									<th>Id</th>
									<th>Nombre</th>
									<th>Cargo</th>
									<th>Imagen</th>
									<th colspan="2">Acciones</th>
								</thead>
								<tbody class="text-left">
									<?php
									$datos = "SELECT * FROM equipo";
									$consultae = mysqli_query($connexion, $datos);

									while ($mostrardatos = mysqli_fetch_array($consultae)) {
									?>
										<tr>
											<td><?php echo $mostrardatos['Id_Integrante'] ?></td>
											<td><?php echo $mostrardatos['Nombre'] ?></td>
											<td><?php echo $mostrardatos['Cargo'] ?></td>
											<td><img class="rounded-circle w-75 border border-5 mt-2 mb-2" src="data:<?php echo $mostrardatos['Tipo_Img']; ?>;base64,<?php echo base64_encode($mostrardatos['Img']); ?>" alt="Img Item <?php echo $mostrardatos['Id_Integrante']; ?>"></td>
											<td><a class="d-block m-4 p-2" href="Equipo_Mod.php?Id=<?php echo $mostrardatos['Id_Integrante']; ?>">Modificar Información</a></td>
											<td>
												<form action="Accesos.php" method="post">
													<input type="text" name="Id" id="Id" value="<?php echo $mostrardatos['Id_Integrante'] ?>" hidden>
													<button class="d-block m-3 text-danger" name="Del-integrante" type="submit" style="width: auto;">Eliminar Integrante</button>
												</form>
											</td>
											
										</tr>
									<?php } ?>
								</tbody>
							</table>

							<a href="Equipo_Subir.php">Agregar integrante</a>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
		</div>
		<!-- /.content-wrapper -->
		<?php
		include_once 'templates/footer.php';
		?>