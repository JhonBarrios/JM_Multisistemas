<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>

        <?php
        include_once "Administrador/db.php";
        $con = mysqli_connect($Host, $Username, $Password, $dbName);
        $query = "SELECT * FROM somos";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($res)) {
        ?>

            <!-- /***** BANNER *****\ -->
            <div class="Banner BannerSomos row align-items-center row-col-12" style="background-image: url(Imagenes/Desktop/Somos.jpg);">
                <div class="Deg col-12">
                    <h1 class="fw-bold TextSomos">¿Quiénes somos?</h1>
                </div>
            </div>

            <!-- /***** TEXT SOMOS *****\ -->
            <div class="Banner TextS row align-items-center row-col-12">
                <div class="col-12">
                    <h1 id="InfoSomos">
                        <?php echo str_replace("\n", "<br><br>", $row['Texto']); ?>
                        <!-- En Jm multisistemas generamos soluciones en tecnologías de la información de alta calidad, integrando productos y servicios a la vanguardia del mercado, siendo aliados estratégicos de nuestros clientes y, garantizando el mejor respaldo desde hace mas de 10 años. <br> <br>
                        La felicidad, las oportunidades y el trabajo en equipo, son la inspiración que garantiza la sostenibilidad de nuestra organización y, se pone en función de facilitarle la vida a nuestros clientes, agregando. -->
                    </h1>
                </div>
            </div>
        <?php } ?>

        <!-- /***** INCLUDE DEL EQUIPO *****\ -->
        <?php include('Include_Equipo.php'); ?>

        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>

        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>