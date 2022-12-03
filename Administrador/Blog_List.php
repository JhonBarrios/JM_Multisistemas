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
						<div class="col-sm-10">
							<h1 class="pb-4">Lista de Blogs</h1>

							<div class="galeria">
								<table class="table table-striped">
									<thead class="table-primary">
										<tr class="text-center">
											<th>Nombre</th>
											<th>Tipo</th>
											<th>Imagen</th>
											<th>Titulo</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include_once "db.php";
										$con = mysqli_connect($Host, $Username, $Password, $dbName);
										$query = "SELECT * FROM blog";
										$res = mysqli_query($con, $query);
										while ($row = mysqli_fetch_assoc($res)) {
										?>
											<tr>
												<td><?php echo $row['NombreImg']; ?></td>
												<td><?php echo $row['Tipo']; ?></td>
												<td>
													<img class="img-thumbnail" src="data:<?php echo $row['Tipo']; ?>;base64,<?php echo base64_encode($row['Imagenes']); ?>">
												</td>
												<td><?php echo $row['TituloBlog']; ?></td>
											</tr>
										<?php }	?>
									</tbody>
								</table>


								<a href="Blog_Subir.php" type="button" class="btn btn-primary"> Subir Blog</a>
							</div>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>