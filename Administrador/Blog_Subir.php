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
							<h1 class="pb-4">Subir Blogs</h1>

							<form name="MiForm" id="MiForm" method="POST" action="Accesos.php" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 control-label">Imagen</label>
									<div class="col-sm-8">
										<input type="file" class="form-control" id="foto" name="foto" required>
										<div class="d-flex mt-2 align-content-center align-items-center justify-content-around flex-row flex-wrap">

											<h3 class="m-0 p-0">NOTA:</h3>
											<p class="m-0 p-0">El peso máximo de una imagen es de 42 Mbps</p>

											<div class="form-floating mt-2 mb-2 w-100">
												<input type="text" class="form-control" id="floatingInputCategoria" placeholder="Categoria" maxlength="25" name="Categoria" required>
												<label for="floatingInputCategoria">Categoria</label>
											</div>

											<div class="form-floating mt-2 mb-2 w-100">
												<textarea type="text" class="form-control" id="floatingTextarea2" placeholder="Titulo del Blog" maxlength="75" name="TituloBlog" style="height: 100px" required></textarea>
												<label for="floatingTextarea2">Titulo del Blog</label>
											</div>

											<div class="form-floating mt-2 mb-2 w-100">
												<textarea type="text" class="form-control" id="floatingTextarea2" placeholder="Contenido del Blog" maxlength="2500" name="ContBlog" style="height: 100px" required></textarea>
												<label for="floatingTextarea2">Contenido del Blog</label>
											</div>

											<div class="form-floating mt-2 mb-2 w-100">
												<input type="text" class="form-control" id="floatingInputTiempo" placeholder="Tiempo de Lectura en Minutos" maxlength="200" name="Tiempo" required>
												<label for="floatingInputTiempo">Tiempo de Lectura en Minutos</label>
											</div>

											<?php $formated_DATE = date('Y-m-d'); ?>
											<input type="text" disabled value="<?php echo($formated_DATE) ?>" id="fecha" name="Fecha" style="display: none;" >

											<div class="form-check form-switch mt-2">
												<input type="hidden" name="DestacadoCheck" value="NoDestacado">
												<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="DestacadoCheck" value="Destacado">
												
												<label class="form-check-label" for="flexSwitchCheckChecked">Blog Destacado</label>
											</div>

										</div>
										<button name="submit-photo" class="btn btn-primary mt-3">Cargar Blog</button>

										<!-- <a href="gallery_index.php" type="button" class="btn btn-warning mt-3"> Ver Galeria</a> -->
									</div>
								</div>
							</form>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>