<?php include_once 'templates/head.php'; ?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper"> <!-- Site wrapper -->
		<?php
		include_once 'templates/barra.php';
		include_once 'templates/navegacion.php';
		?>
		<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
			<section class="content-header"> <!-- Content Header (Page header) -->
				<div class="container-fluid"><!-- container-fluid -->
					<div class="row mb-2">
						<div class="col-sm-6">
							<?php 
								// Agregar informes de gestión mediante la página inf_new.php
							if (isset($_POST["view-table"])) {
								$codigo = $_POST['codigo'];
								$tipo = $_POST['type'];

								if ($tipo == "'Informe_Gestion'") {
									$tipo2 = "Informe de Gestion";
									
									$cons_l="SELECT * FROM informes_gestion WHERE Id_inf = $codigo";
				          $consulta_l = mysqli_query($connexion,$cons_l);
				          while($mostrardatos9=mysqli_fetch_array($consulta_l)) {

										?><h1 class="pb-4">Tabla del <?php echo ($tipo2); echo " - "; echo $mostrardatos9['Titulo']; ?> </h1> <?php
									}
								}

								if ($tipo == "'Proyecto'") {
									$tipo2 = "Proyecto";

									$cons_l="SELECT * FROM informes_gestion WHERE Id_inf = $codigo";
				          $consulta_l = mysqli_query($connexion,$cons_l);
				          while($mostrardatos9=mysqli_fetch_array($consulta_l)) {
								
										?><h1 class="pb-4">Tabla del <?php echo $tipo2; echo " - "; echo $mostrardatos9['Titulo']; ?>  </h1> <?php
									}
								}
								echo "<div class='table-responsive'>";
								echo "<table class='table table-bordered table-striped w-100 m-auto mt-4 mb-5'>";
								echo "<thead class='table-dark text-center'>";
								echo "<tr>";
								echo "<th> Item </th>";
								echo "<th> Valor </th>";
								echo "</tr>";
								echo "</thead>";
								echo "<tbody>";

							              // Ciclo para mostrar la tabla del informe
								$consulta_tabla2 = "SELECT Item, Valor FROM informes_gestion_table INNER JOIN informes_gestion ON informes_gestion.Year = informes_gestion_table.Year WHERE Id_inf = $codigo AND Tipo_Dato_Tabla = $tipo";
								$resultado_Informe_table3=mysqli_query($connexion,$consulta_tabla2);

								while($mostrardatos3=mysqli_fetch_array($resultado_Informe_table3)){
									echo "<tr>";
									echo "<td>".$mostrardatos3['Item']."</td>";
									echo "<td>".$mostrardatos3['Valor']."</td>";
									echo "</tr>";
								}
								echo "</tbody>";
								echo "</table>";
								echo "</div>";
							}
							?>
							<button type="button" class="btn btn-outline-primary mt-3"><a href="inf_list.php" id="linka">Regresar</a></button>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php	include_once 'templates/footer.php'; ?>