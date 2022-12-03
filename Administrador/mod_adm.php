<?php
include_once 'templates/head.php';
?>
<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php
		include_once 'templates/barra.php';
		include_once 'templates/navegacion.php';
		?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Modificar datos del Administrador</h1>

							<table class="tabla-administrador tabla-administrador-peq">
								<thead>
									<th>Item</th>
									<th>Valor</th>
								</thead>
								<tbody>
									<?php
				          $datos="SELECT * FROM acceso_administrador";
				          $consulta2 = mysqli_query($connexion,$datos);
				          while($mostrardatos=mysqli_fetch_array($consulta2)) {
				          ?>
									<form class="" action="Accesos.php" method="POST">
									<tr>
										<input type="hidden" name="ID" value="<?php echo $mostrardatos['ID_Admin'] ?>">
										<td>Nombre</td>
										<td><input type="text" name="New_Nombre" value="<?php echo $mostrardatos['Nombre'] ?>"></td>
									</tr>

									<tr>
										<input type="hidden" name="ID" value="<?php echo $mostrardatos['ID_Admin'] ?>">
										<td>Usuario</td>
										<td><input type="text" name="New_Usuario" value="<?php echo $mostrardatos['Usuario'] ?>"></td>
									</tr>

									<tr>
										<input type="hidden" name="ID" value="<?php echo $mostrardatos['ID_Admin'] ?>">
										<td>Contraseña</td>
										<td><input type="text" name="New_Contraseña" value="<?php echo $mostrardatos['Contraseña'] ?>"></td>
									</tr>

									<tr>
										<input type="hidden" name="ID" value="<?php echo $mostrardatos['ID_Admin'] ?>">
										<td>Correo</td>
										<td><input type="email" name="New_Correo" value="<?php echo $mostrardatos['Correo'] ?>"></td>
									</tr>

									<tr>
										<input type="hidden" name="ID" value="<?php echo $mostrardatos['ID_Admin'] ?>">
										<td colspan="2" ><button class="btn btn-info col-md-offset-9" type="submit" name="actualizar_adm">Modificar</button></td>
									</tr>
									</form>
									<?php } ?>
								</tbody>
							</table>

							<i><p class="">En caso de tener alguna inquietud contactar a los desarrolladores de la web. <br><br>
							  <b>Nombre: </b> Jhon Barrios & Diego Rueda<br>
							  <b>Correo: </b> jhonbarrios5@gmail.com / diegotaku19@gmail.com <br>
							  <b>Celular: </b> 3017494323 - 313 7342473</p></i>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
		</div>
		<!-- /.content-wrapper -->
		<?php
		include_once 'templates/footer.php';
		?>
