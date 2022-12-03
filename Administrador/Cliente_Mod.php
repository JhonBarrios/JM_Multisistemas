<?php include_once 'templates/head.php'; ?>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Site wrapper -->
		<?php
		include_once 'templates/barra.php';
		include_once 'templates/navegacion.php';
		?>
		<div class="content-wrapper">
			<!-- Content Wrapper. Contains page content -->
			<section class="content-header">
				<!-- Content Header (Page header) -->
				<div class="container-fluid">
					<!-- container-fluid -->
					<div class="row mb-2">
						<div class="col-sm-12">
							<?php
							$ID_T = $_REQUEST['Id'];
							$datos = "SELECT * FROM clientes WHERE Id_Cliente = $ID_T";
							$consultae = mysqli_query($connexion, $datos);

							while ($mostrardatos = mysqli_fetch_array($consultae)) {
							?>
								<h1 class="pb-4">Modificar Información del Cliente - <?php echo $mostrardatos['Nombre'] ?> </h1>

								<form name="MiForm" id="MiForm" method="POST" action="Accesos.php" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-8">
											<div class="d-flex mt-2 align-content-center align-items-center justify-content-around flex-row flex-wrap">

												<div class="form-floating mt-2 mb-2 w-100">
													<input type="text" class="form-control" id="floatingInputNombre" value="<?php echo $mostrardatos['Nombre'] ?>" placeholder="Nombre" maxlength="70" name="Nombre" required>
													<label for="floatingInputNombre">Nombre</label>
												</div>

												<div class="input-group mt-2 mb-2 w-100">
													<select class="form-select" id="inputGroupSelect01" name="inputGroupSelect01">
														<option selected>Selecciona...</option>
														<option value="<?php echo $mostrardatos['Sector'] ?>" selected><?php echo $mostrardatos['Sector'] ?></option>
														<option value="Comerciales">Comerciales</option>
														<option value="Gobierno">Gobierno</option>
														<option value="Educación">Educación</option>
														<option value="Salud">Salud</option>
													</select>
												</div>
												<input type="text" name="Id" id="Id" value="<?php echo $mostrardatos['Id_Cliente'] ?>" hidden>
											</div>
											<button name="mod-clientes" class="btn btn-primary mt-3">Modificar Cliente</button>
										</div>
									</div>
								</form>
							<?php } ?>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>