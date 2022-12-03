<?php
require('Administrador/Accesos.php');
$result = $connexion->query('SELECT COUNT(*) as blogss FROM blog'); //WHERE active = 1'
$row = $result->fetch_assoc();
$num_total_rows = $row['blogss'];
?>

<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>

        <!-- /***** BANNER *****\ -->
        <div class="Banner row align-items-center row-col-12" style="background-image: url(Imagenes/Desktop/Blog.jpg);">
            <div class="col-12">
                <h1 class="fw-bold TextSomos p-0">Blog</h1>
            </div>
        </div>

        <!-- /***** SECCIÓN INICIAL DEL BLOG *****\ -->
        <div class="Seccionblog pt-5 pb-5 text-center m-auto">
            <form class="row gy-2 gx-3 align-items-center">
                <div class="col-auto m-auto w-50">
                    <label class="visually-hidden" for="autoSizingInputGroup">Buscar articulo</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1.2em" height="1.2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="none" stroke="#A0A0A0" stroke-linecap="round" stroke-width="2" d="m21 21l-4.486-4.494M19 10.5a8.5 8.5 0 1 1-17 0a8.5 8.5 0 0 1 17 0Z" />
                            </svg>
                        </div>
                        <input type="text" class="form-control" id="autoSizingInputGroup bloginput" placeholder="Buscar articulo">
                    </div>
                </div>
            </form>

            <div class="row col-10 m-auto pt-5">

                <!-- /***** PARTE IZQUIERDA DEL BLOG *****\ -->
                <div id="text-align-justify" class="Blogs col-xs-12 col-sm-12  col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                    <?php

if ($num_total_rows > 0) {
    $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    }
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
                        $result = $connexion->query('SELECT * FROM blog ORDER BY Destacado ASC LIMIT ' . $start . ', ' . NUM_ITEMS_BY_PAGE);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                                <div id="<?php echo $row['Destacado']; ?>" class="ItemCategoria Id<?php echo $row['Id_Item']; ?> col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
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

                    <?php }
                        } } ?>

                </div>

                <!-- /***** PARTE DERECHA DEL BLOG *****\ -->
                <div class="mt-xs-5 mt-sm-5 mt-md-0 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">

                    <div class="novedades">
                        <h1 class="Cardh1">Entérate de nuestras novedades</h1>
                        <div class="colum col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="form-group mt-4">
                                <label>Suscribete</label> <br>
                                <form name="MiForm" id="MiForm" method="POST" action="Administrador/Accesos.php" enctype="multipart/form-data">
                                    <input class="form-control input letrainput w-100" id="email" name="email" type="email" aria-describedby="emailHelpId" placeholder="email"> <br>
                                    <input class="form-control input letrainput w-100" id="nombre" name="nombre" type="text" placeholder="nombre"> <br>
                                    <button class="input buttonsend w-100" name="suscripcion">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="popular">
                        <h6>Lo más popular</h6>
                        <hr>
                        <div class="itemPopular">
                            <h1 class="row num numero col-2">01</h1>
                            <p class="row num textnum col-9">Así es como NO debes montar una refrigeración liquida all-in-one</p>
                            <br>
                            <span class="tiempo num row col-6">4 min de lectura</span>
                            <span class="ver num row col-6">Ver...</span>
                        </div>
                        <div class="itemPopular">
                            <h1 class="row num numero col-2">02</h1>
                            <p class="row num textnum col-9">Las RX 7000 serán menos potentes, AMD recorta sus especificaciones</p>
                            <br>
                            <span class="tiempo num row col-6">4 min de lectura</span>
                            <span class="ver num row col-6">Ver...</span>
                        </div>
                        <div class="itemPopular">
                            <h1 class="row num numero col-2">03</h1>
                            <p class="row num textnum col-9">ASUS lanza una tarjeta gráfica y una placa base basadas en Evangelion</p>
                            <br>
                            <span class="tiempo num row col-6">4 min de lectura</span>
                            <span class="ver num row col-6">Ver...</span>
                        </div>
                        <div class="itemPopular">
                            <h1 class="row num numero col-2">04</h1>
                            <p class="row num textnum col-9">Las futuras gráficas top serán casi 10 veces más potentes que la PS5</p>
                            <br>
                            <span class="tiempo num row col-6">4 min de lectura</span>
                            <span class="ver num row col-6">Ver...</span>
                        </div>
                    </div>
                </div>

                <?php
                if ($num_total_rows > 0) {
                    $page = false;

                    //examino la pagina a mostrar y el inicio del registro a mostrar
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    }

                    if (!$page) {
                        $start = 0;
                        $page = 1;
                    } else {
                        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
                    }
                    //calculo el total de paginas
                    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

                    echo '<nav class="row col-12 " aria-label="Page navigation example">';
                    echo '<ul class="pagination pt-5 justify-content-center">';

                    if ($total_pages > 1) {
                        if ($page != 1) {
                            echo '<li class="page-item"><a class="page-link" href="blog.php?page=' . ($page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($page == $i) {
                                echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="blog.php?page=' . $i . '">' . $i . '</a></li>';
                            }
                        }
                        if ($page != $total_pages) {
                            echo '<li class="page-item"><a class="page-link" href="blog.php?page=' . ($page + 1) . '"><span aria-hidden="true">&raquo;</span></a></li>';
                        }
                    }
                    echo '</ul>';
                    echo '</nav>';
                }
                ?>

            </div>
        </div>


        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>

        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>