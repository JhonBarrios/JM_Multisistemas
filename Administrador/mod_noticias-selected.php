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
							<?php
								if (isset($_POST["mod-news"])) {
									$ID_News = $_POST['ID_N'];
									$Titulo = $_POST['Title_N'];
									$cons_news = "SELECT * FROM news WHERE Id_news = $ID_News"; 
								}
							?>
								<?php
			      	    $consulta_news = mysqli_query($connexion,$cons_news);
				          while($mostrardatos=mysqli_fetch_array($consulta_news)) {
		    	      ?>
								<form action="Accesos.php" method="POST" class="form_inf" enctype="multipart/form-data">	

								<input type="hidden" name="Id-New" value="<?php echo $mostrardatos['Id_news'] ?>">					

								<div class="mb-3 row">
									<label for="inputTitleNew" class="col-sm-2 col-form-label">Titulo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" maxlength="50" id="inputTitleNew" value="<?php echo $mostrardatos['Titulo_News']?>" name="inputTitleNew" required>
									</div>
								</div>

								<div class="mb-3">
									<label for="FormControlNote" class="form-label">Descripción</label>
									<textarea class="form-control" id="FormControlNote" maxlength="230" name="FormControlNote" rows="3" required><?php echo $mostrardatos['Descripcion_News']?></textarea>
								</div>

								<button class="btn btn-info col-md-offset-9" type="submit" name="mod_new">Modificar Noticia</button>
							</form>
							<?php } ?>
						</div>
					</div>
					

				</div><!-- /.container-fluid -->
			</section><!-- /.Content Header (Page header) -->
		</div><!-- /.content-wrapper -->
		<?php	include_once 'templates/footer.php'; ?>