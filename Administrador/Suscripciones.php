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
							<h1 class="pb-4">Lista de Personas Suscritas</h1>

							<table class="table table-striped">
								<thead class="table-primary">
									<tr class="text-center">
										<th>Nombre</th>
										<th>Email</th>
										<th colspan="2">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include_once "db.php";
									$con = mysqli_connect($Host, $Username, $Password, $dbName);
									$query = "SELECT * FROM suscripcion";
									$res = mysqli_query($con, $query);
									while ($row = mysqli_fetch_assoc($res)) {
									?>
										<tr>
											<td><?php echo $row['nombre']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><button type="button" class="btn btn-outline-info">Modificar</button></td>
											<td><button type="button" class="btn btn-outline-danger">Eliminar</button></td>
										</tr>
									<?php }	?>
								</tbody>
							</table>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>