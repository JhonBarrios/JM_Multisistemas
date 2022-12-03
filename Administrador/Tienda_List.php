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
							<h1 class="pb-4">Listar Items de la Tienda</h1>
							<table class="table table-striped align-middle">
								<thead class="text-center">
									<tr>
										<th scope="col" style="max-width: 10px;">Id</th>
										<th scope="col">Nombre</th>
										<th scope="col">Descripción</th>
										<th scope="col">Stock</th>
										<th scope="col">Precio</th>
										<th scope="col" colspan="2">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include_once "db.php";
									$con = mysqli_connect($Host, $Username, $Password, $dbName);
									$query = "SELECT * FROM ecommercelocal";
									$res = mysqli_query($con, $query);
									while ($row = mysqli_fetch_assoc($res)) {
									?>
									<tr>
										<td scope="row" class="align-middle"><?php echo $row['Id_Pro']; ?></td>
										<td class="align-middle"><?php echo $row['Nom_Ref']; ?></td>
										<td class="align-middle"><?php echo $row['Descripcion_Pro']; ?></td>
										<td class="align-middle"><?php echo $row['Stock']; ?></td>
										<td class="align-middle"><?php echo $row['Precio_Venta']; ?></td>
										<td class="align-middle"><a href="Tienda_Subir_img.php?Id=<?php echo $row['Id_Pro']; ?>">Subir Imagen</a></td>
										<td class="align-middle"><a href="#?Id=<?php echo $row['Id_Pro']; ?>">Actualizar Info</a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php include_once 'templates/footer.php'; ?>