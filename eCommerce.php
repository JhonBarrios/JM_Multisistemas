<?php
require('Administrador/Accesos.php');
$result = $connexion->query('SELECT COUNT(*) as eCommerce FROM ecommercelocal'); //WHERE active = 1'
$row = $result->fetch_assoc();
$num_total_rows = $row['eCommerce'];
?>

<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>

        <!--  /***** ESTE ES EL MENU INICIAL *****\ -->
        <div class="row masonry-grid flex-nowrap">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 masonry-column">
                <div class="position-relative">
                    <a href="#" class="w-100"><img class="w-100" src="Imagenes/Desktop/eCommerce/1.jpg"></a>
                    <div class="h-100 Deg">
                        <div class="position-absolute d-block bottom-0 h-50 alturabds">
                            <span class=" fw-bold mt-0 mt-md-5 ms-4 ms-md-5 mb-2 mb-md-3 color_white h2 d-grid"><span class=" fw-bold h1 text-break lh-sm"> NUEVO </span> iphone 13 pro max</span>
                            <button class="ms-4 ms-md-5 border border-1 border-white rounded bg-transparent color_white p-2 ps-3 pe-3"> Ver más </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 d-none d-md-block masonry-column">
                <div class="h-50 bg-img position-relative" style="background-image: url(Imagenes/Desktop/eCommerce/3.jpg);">
                    <a href="#" class="thumbnail"></a>
                    <div class="h-100 Deg bg-opacity-75">
                        <div class="position-absolute d-block text-end bottom-0 end-0 h-50">
                            <span class=" fw-bold me-5 ms-5 mb-3 color_white h2 d-grid"><span class=" fw-bold h1 text-break lh-1"> 30% Dpto </span> Accesorios lapto</span>
                        </div>
                    </div>
                </div>
                <div class="h-50 bg-img position-relative" style="background-image: url(Imagenes/Desktop/eCommerce/2.jpg);">
                    <a href="#" class="thumbnail"></a>
                    <div class="h-100 Deg bg-opacity-75">
                        <div class="position-absolute d-block bottom-0 h-50">
                            <span class=" fw-bold mt-5 ms-5 mb-3 color_white h2 d-grid"> 20% Dpto Gaming </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  /***** ESTA ES LA BARRA DE BUSQUEDA *****\ -->
        <div class="mt-5 mb-5">
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

            <!--  /***** ESTA ES LA SECCION DE NAVEGACION ENTRE LOS PRODUCTOS *****\ -->
            <div class="d-flex flex-sm-column flex-md-row justify-content-md-evenly mt-5 mb-5">
                <div class="mt-4">
                    <a href="http://#" class="text-decoration-none d-grid" target="_blank" rel="noopener noreferrer" style="justify-items: center;color: var(--main-bg-color);">
                        <i class="fa-solid fa-laptop fa-2xl mb-5"></i>
                        <span>Computadores</span>
                    </a>
                </div>
                <div class="mt-4">
                    <a href="http://#" class="text-decoration-none d-grid" target="_blank" rel="noopener noreferrer" style="justify-items: center;color: var(--main-bg-color);">
                        <i class="fa-solid fa-headphones-simple fa-2xl mb-5"></i>
                        <span>Accesorios</span>
                    </a>
                </div>
                <div class="mt-4">
                    <a href="http://#" class="text-decoration-none d-grid" target="_blank" rel="noopener noreferrer" style="justify-items: center;color: var(--main-bg-color);">
                        <i class="fa-solid fa-mobile-screen-button fa-2xl mb-5"></i>
                        <span>Celulares y tablets</span>
                    </a>
                </div>
                <div class="mt-4">
                    <a href="http://#" class="text-decoration-none d-grid" target="_blank" rel="noopener noreferrer" style="justify-items: center;color: var(--main-bg-color);">
                        <i class="fa-solid fa-network-wired fa-2xl mb-5"></i>
                        <span>Suministro</span>
                    </a>
                </div>
            </div>
            <hr class="w-75 m-auto">

            <!--  /***** ESTA ES LA TIENDA *****\ -->

            <div class="row row-cols-1 row-cols-md-3 col-10 mt-5 m-auto g-4" style="text-align: -webkit-center;row-gap: 5vh;">
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
                        $start = ($page - 1) * NUM_ITEMS_BY_PAGECom;
                    }
                    //calculo el total de paginas
                    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGECom);

                    include_once "Administrador/db.php";
                    $con = mysqli_connect($Host, $Username, $Password, $dbName);
                    $result = $connexion->query('SELECT * FROM ecommercelocal LIMIT ' . $start . ', ' . NUM_ITEMS_BY_PAGECom);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                ?>
                            <div class="col">
                                <div class="card w-75 CustomHover h-100">

                                    <img src="Imagenes/Desktop/eCommerce/Producto1.png" class="card-img-top" alt="Producto # <?php echo $row['Id_Pro']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title text-center"><?php echo $row['Nom_Ref']; ?></h5>
                                        <p class="card-text text-center"><?php echo $row['Precio_Venta']; ?></p>
                                    </div>
                                    <div class="card-footer p-0 Custominvisible">
                                        <div class="d-grid col-12 mx-auto">
                                            <a href="eCommerce_product.php?Id=<?php echo $row['Id_Pro']; ?>"><button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>

                <!-- 
                <div class="col">
                    <div class="card w-75 CustomHover h-100">
                        <img src="Imagenes/Desktop/eCommerce/Producto1.png" class="card-img-top" alt="Producto # 1">
                        <div class="card-body">
                            <h5 class="card-title text-center">MacBook Air de 13" Pulgadas </h5>
                            <p class="card-text text-center">$ 5.239.000</p>
                        </div>
                        <div class="card-footer p-0 Custominvisible">
                            <div class="d-grid col-12 mx-auto">
                                <a href="eCommerce_product.php"><button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card w-75 CustomHover h-100">
                        <img src="Imagenes/Desktop/eCommerce/Producto2.png" class="card-img-top" alt="Producto # 2">
                        <div class="card-body">
                            <h5 class="card-title text-center">MacBook notebooks </h5>
                            <p class="card-text text-center">$ 5.239.000</p>
                        </div>
                        <div class="card-footer p-0 Custominvisible">
                            <div class="d-grid col-12 mx-auto">
                                <a href="eCommerce_product.php"><button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card w-75 CustomHover h-100">
                        <img src="Imagenes/Desktop/eCommerce/Producto3.png" class="card-img-top" alt="Producto # 3">
                        <div class="card-body">
                            <h5 class="card-title text-center">MacBook notebooks </h5>
                            <p class="card-text text-center">$ 5.239.000</p>
                        </div>
                        <div class="card-footer p-0 Custominvisible">
                            <div class="d-grid col-12 mx-auto">
                                <a href="eCommerce_product.php"><button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card w-75 CustomHover h-100">
                        <img src="Imagenes/Desktop/eCommerce/Producto2.png" class="card-img-top" alt="Producto # 2">
                        <div class="card-body">
                            <h5 class="card-title text-center">MacBook notebooks </h5>
                            <p class="card-text text-center">$ 5.239.000</p>
                        </div>
                        <div class="card-footer p-0 Custominvisible">
                            <div class="d-grid col-12 mx-auto">
                                <a href="eCommerce_product.php"><button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card w-75 CustomHover h-100">
                        <img src="Imagenes/Desktop/eCommerce/Producto1.png" class="card-img-top" alt="Producto # 3">
                        <div class="card-body">
                            <h5 class="card-title text-center">MacBook Air de 13" Pulgadas </h5>
                            <p class="card-text text-center">$ 5.239.000</p>
                        </div>
                        <div class="card-footer p-0 Custominvisible">
                            <div class="d-grid col-12 mx-auto">
                                <a href="eCommerce_product.php"><button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card w-75 CustomHover h-100">
                        <img src="Imagenes/Desktop/eCommerce/Producto3.png" class="card-img-top" alt="Producto # 3">
                        <div class="card-body">
                            <h5 class="card-title text-center">MacBook notebooks </h5>
                            <p class="card-text text-center">$ 5.239.000</p>
                        </div>
                        <div class="card-footer p-0 Custominvisible">
                            <div class="d-grid col-12 mx-auto">
                                <a href="eCommerce_product.php"><button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                -->
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
                $start = ($page - 1) * NUM_ITEMS_BY_PAGECom;
            }
            //calculo el total de paginas
            $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGECom);

            echo '<nav class="row col-12 " aria-label="Page navigation example">';
            echo '<ul class="pagination pt-5 justify-content-center">';

            if ($total_pages > 1) {
                if ($page != 1) {
                    echo '<li class="page-item"><a class="page-link" href="eCommerce.php?page=' . ($page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($page == $i) {
                        echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="eCommerce.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                if ($page != $total_pages) {
                    echo '<li class="page-item"><a class="page-link" href="eCommerce.php?page=' . ($page + 1) . '"><span aria-hidden="true">&raquo;</span></a></li>';
                }
            }
            echo '</ul>';
            echo '</nav>';
        }
        ?>

        <!-- /***** BOTONES DE NAVEGACIÓN DE LA TIENDA *****\ 
        <nav class="row col-12 " aria-label="Page navigation example">
            <ul class="pagination pt-5 justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav> -->

        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>

        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>