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
								include_once "db.php";
								$con = mysqli_connect($Host, $Username, $Password, $dbName);
								$query = "SELECT * FROM ecommercelocal WHERE Id_Pro = $ID_T";
								$res = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($res)) {
							?>
							<h1 class="pb-4">Subir Imagenes al Producto - <?php echo $row['Id_Pro']; ?> - <?php echo $row['Nom_Ref']; ?></h1>

							<form class="mt-4 mb-4" name="MiForm" id="MiForm" method="POST" action="Accesos.php?Id=<?php echo $row['Id_Pro']; ?>" enctype="multipart/form-data">
								<div class="form-group">
									
									<div class="col-sm-8">	
										<input type="file" class="form-control" id="image" name="image" multiple required>
										<p class="m-0 mt-2 p-0 text-decoration-underline"><strong>NOTA:</strong> El peso máximo de una imagen es de 42 Mbps</p> 
										<button name="Subir-Producto-Img" class="btn btn-primary mt-4">Cargar Imagen</button>
										<a href="Tienda_List.php"> <button type="button" class="btn btn-warning mt-4">Regresar</button></a>
									</div>
								</div>
							</form>
							<?php } ?>

							<div class="col-8 mt-4 d-inline-flex justify-content-evenly flex-nowrap">
							<?php
								$ID_T = $_REQUEST['Id'];
								include_once "db.php";
								$con = mysqli_connect($Host, $Username, $Password, $dbName);
								$query = "SELECT * FROM ecommerceimg WHERE Id_Padre = $ID_T";
								$res = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($res)) {

								echo '<img class="w-25 img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $row['Nombre'] ).'"/>';

								} ?>
							</div>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>