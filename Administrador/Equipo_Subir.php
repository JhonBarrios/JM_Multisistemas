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
							<h1 class="pb-4">Agregar Integrante</h1>

							<form name="MiForm" id="MiForm" method="POST" action="Accesos.php" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 control-label">Imagen</label>
									<div class="col-sm-8">
										<input type="file" class="form-control" id="foto" name="foto" required>
										<div class="d-flex mt-2 align-content-center align-items-center justify-content-around flex-row flex-wrap">

											<div class="form-floating mt-2 mb-2 w-100">
												<input type="text" class="form-control" id="floatingInputNombre" placeholder="Nombre" maxlength="70" name="Nombre" required>
												<label for="floatingInputNombre">Nombre</label>
											</div>

											<div class="form-floating mt-2 mb-2 w-100">
												<input type="text" class="form-control" id="floatingInputCargo" placeholder="Cargo" maxlength="70" name="Cargo" required>
												<label for="floatingInputCargo">Cargo</label>
											</div>
										</div>
										<button name="submit-integrante" class="btn btn-primary mt-3">Cargar Integrante</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>