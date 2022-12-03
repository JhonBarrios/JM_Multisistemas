<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>


        <!-- /***** SECCIÓN INICIAL DEL BLOG *****\ -->
        <div class="Seccionblog pt-5 pb-5 text-center m-auto">
            <div id="text-align-justify" class="m-auto col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                <?php 
                    $ID = $_GET["Id_Iteme"]; 

                    include_once "Administrador/db.php";
                    $con = mysqli_connect($Host, $Username, $Password, $dbName);
                    $query = "SELECT * FROM blog WHERE Id_Item = $ID";

                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>

                    <h3 class="TitleCategoria mt-5 fw-bold"><?php echo $row['TituloBlog']; ?></h3>

                    <h6 class="TitleCategoria mt-4 mb-5 text-muted fw-bold"><?php echo $row['Creado']; ?></h6>

                    <img class="ImgCategoria2 mb-5 col-12" src="data:<?php echo $row['Tipo']; ?>;base64,<?php echo base64_encode($row['Imagenes']); ?>" alt="Img Item <?php echo $row['Id_Item']; ?>">

                    <?php echo str_replace("\n", "<br>", $row['ContBlog']); ?>

                <?php } ?>
            </div>

            <div class="row col-10 m-auto pt-5" style="text-align: -webkit-center;row-gap: 5vh;">
                <p class="m-0 d-flex"> <strong> También te puede interesar </strong> </p>
                <hr class="w-100 m-auto">

                <!-- /***** PARTE IZQUIERDA DEL BLOG *****\ -->
                <div id="text-align-justify" class="Blogs col-xs-12 col-sm-12  col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <?php
                        include_once "Administrador/db.php";
                        $con = mysqli_connect($Host, $Username, $Password, $dbName);
                        $query = "SELECT * FROM blog ORDER BY Id_Item DESC LIMIT 0,3";

                        $res = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                        <div class="ItemCategoria Id<?php echo $row['Id_Item']; ?> col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                            <img class="ImgCategoria col-12" src="data:<?php echo $row['Tipo']; ?>;base64,<?php echo base64_encode($row['Imagenes']); ?>" alt="Img Item <?php echo $row['Id_Item']; ?>">
                            <div class="infoCategoria p-4">
                                <p class="BlogCategoria fw-bold pb-1"><?php echo $row['Categoria']; ?></p>
                                <h4 class="TitleCategoria fw-bold"><?php echo $row['TituloBlog']; ?></h4>
                                <h6 class="TextCategoria text-truncate pt-2" style="max-height: 150px"><?php echo $row['ContBlog']; ?></h6>
                                <div class="morelinks">
                                    <span class="tiempo col-5">Lectura de <?php echo $row['Tiempo']; ?> min</span>
                                    <span class="ButtonCategoria col-5"><a href="blog_lectura.php?Id_Iteme=<?php echo $row['Id_Item']; ?> " class="text-white text-decoration-none">Leer más</a></span>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>

            </div>
        </div>


        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>

        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>