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
							$datos = "SELECT * FROM equipo WHERE Id_Integrante = $ID_T";
							$consultae = mysqli_query($connexion, $datos);

							while ($mostrardatos = mysqli_fetch_array($consultae)) {
							?>
								<h1 class="pb-4">Modificar Información del Integrante - <?php echo $mostrardatos['Nombre'] ?> </h1>

								<form name="MiForm" id="MiForm" method="POST" action="Accesos.php" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-8">
											<div class="d-flex mt-2 align-content-center align-items-center justify-content-around flex-row flex-wrap">

												<div class="form-floating mt-2 mb-2 w-100">
													<input type="text" class="form-control" id="floatingInputNombre" value="<?php echo $mostrardatos['Nombre'] ?>" placeholder="Nombre" maxlength="70" name="Nombre" required>
													<label for="floatingInputNombre">Nombre</label>
												</div>

												<div class="form-floating mt-2 mb-2 w-100">
													<input type="text" class="form-control" id="floatingInputCargo" value="<?php echo $mostrardatos['Cargo'] ?>" maxlength="70" name="Cargo" required>
													<label for="floatingInputCargo">Cargo</label>
												</div>

												<input type="text" name="Id" id="Id" value="<?php echo $mostrardatos['Id_Integrante'] ?>" hidden>

											</div>
											<button name="mod-integrante" class="btn btn-primary mt-3">Modificar Integrante</button>
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