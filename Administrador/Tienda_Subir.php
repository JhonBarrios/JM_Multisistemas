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
							<h1 class="pb-4">Subir Item a la Tienda</h1>

							<form name="MiForm" id="MiForm" method="POST" action="Accesos.php" enctype="multipart/form-data">
								<div class="form-group">
									
									<div class="col-sm-8">

										<div class="d-flex mt-2 align-content-center align-items-center justify-content-around flex-row flex-wrap">

											<div class="form-floating mt-2 mb-2 w-100">
												<input type="text" class="form-control" id="floatingInputName" placeholder="Nombre del Producto" maxlength="40" name="NameProduct" required>
												<label for="floatingInputName">Nombre del Producto</label>
											</div>

											<div class="form-floating mt-2 mb-2 w-100">
												<textarea type="text" class="form-control" id="floatingTextProduct" placeholder="Descripción del Producto" maxlength="150" name="Des_Pro" style="height: 150px" required></textarea>
												<label for="floatingTextProduct">Descripción del Producto</label>
											</div>

											<div class="form-floating mt-2 mb-2 w-100">
												<input type="number" class="form-control" id="floatingInputStock" placeholder="Productos en Stock" name="Stock" required>
												<label for="floatingInputStock">Stock</label>
											</div>

											<div class="form-floating mt-2 mb-2 w-100">
												<input type="number" class="form-control" id="floatingInputPrecio" placeholder="Precio de venta" name="Precio" required>
												<label for="floatingInputPrecio">Precio de Venta</label>
											</div>

										</div>
										<button name="Subir-Producto" class="btn btn-primary mt-3">Cargar Producto</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>