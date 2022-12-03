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
							<h1 class="pb-4">Agregar imagen y texto - SOMOS JM</h1>

							<form name="MiForm" id="MiForm" method="POST" action="Accesos.php" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 control-label">Imagen</label>
									<div class="col-sm-8">
										<div class="d-flex mt-2 mb-2 align-content-center align-items-center justify-content-around flex-row flex-wrap">
											<input type="file" class="form-control" id="foto" name="foto" required>

											<div class="form-floating mt-2 mb-2 w-100">
												<textarea type="text" class="form-control" id="floatingTextProduct" placeholder="Descripción" maxlength="700" name="Des_Jm" style="height: 200px" required></textarea>
												<label for="floatingTextProduct">Texto JM</label>
											</div>

										</div>
										<button name="Subir-JM" class="btn btn-primary mt-3">Cargar Información</button>
									</div>
								</div>
							</form>

							<div class="col-8">
								<?php
								include_once "db.php";
								$con = mysqli_connect($Host, $Username, $Password, $dbName);
								$query = "SELECT * FROM somos";
								$res = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($res)) {
								?>

									<img class="w-25 border border-5 mt-2 mb-2" src="data:<?php echo $row['T_Img']; ?>;base64,<?php echo base64_encode($row['Img_JM']); ?>" alt="Img Item <?php echo $row['Id_JM']; ?>">

									<?php echo "</br>" ?>

									<?php echo str_replace("\n", "<br>", $row['Texto']); ?>

								<?php } ?>
							</div>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>