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
							<h1>Modificar Noticia</h1>
							<table class="table table-custom table-personalizada-blue text-center">
								<thead>
									<tr>
										<th>Id Noticia</th>
										<th>Titulo</th>
										<th>Modificar</th>
									</tr>
								</thead>
								<tbody>
									<?php
					          $cons_news="SELECT * FROM news";
					          $consulta_news = mysqli_query($connexion,$cons_news);
					          while($mostrardatos=mysqli_fetch_array($consulta_news)) {
				          ?>
									<tr>
										<td name="Id-<?php echo $mostrardatos['Id_news'] ?>"><?php echo $mostrardatos['Id_news'] ?></td>
										<td name="Title-<?php echo $mostrardatos['Id_news'] ?>"><?php echo $mostrardatos['Titulo_News'] ?></td>
										<td>
											<form action="mod_noticias-selected.php" method="POST" name="mod_news">
										    <input name="ID_N" value="<?php echo $mostrardatos['Id_news'] ?>" type="hidden" /> 
										    <input name="Title_N" value="<?php echo $mostrardatos['Titulo_News'] ?>" type="hidden" /> 
										    <input type="submit" name="mod-news" value="Modificar" class="btn btn-primary" />
											</form>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					

				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php	include_once 'templates/footer.php'; ?>