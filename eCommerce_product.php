<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>

        <!--  /***** ESTA ES LA BARRA DE BUSQUEDA *****\ -->
        <div class="mt-5 mb-5">

            <div class="productos">

                <div class="col-12 text-center m-auto text-uppercase">
                    <nav aria-label="breadcrumb" class="text-center">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Tienda</a></li>
                            <li class="breadcrumb-item"><a href="#">computadores</a></li>
                            <li class="breadcrumb-item active" aria-current="page">MacBook Air</li>
                        </ol>
                    </nav>
                </div>

                <div class="row col-10 m-auto pt-5 pb-5">
                    <div class="col-8">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="Imagenes/Desktop/eCommerce/Producto1.png" class="d-block w-100" alt="Imagen principal">
                                </div>
                                <div class="carousel-item">
                                    <img src="Imagenes/Desktop/eCommerce/Producto1.png" class="d-block w-100" alt="Imagen Secundaria">
                                </div>
                                <div class="carousel-item">
                                    <img src="Imagenes/Desktop/eCommerce/Producto1.png" class="d-block w-100" alt="Imagen Terciaria">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-4">
                        <h4 class="text-center fw-bold">MacBook Air de 13" Pulgadas</h4>
                        <hr class="mt-4 mb-4">
                        <div class="boxdes p-4">
                            <h3 class="Precio text-center pb-4">$ 5.239.000</h3>

                            <div class="input-group mb-3">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">1 </button>
                                <ul class="dropdown-menu prod">
                                    <li><a class="dropdown-item" href="#">2 </a></li>
                                    <li><a class="dropdown-item" href="#">3 </a></li>
                                    <li><a class="dropdown-item" href="#">4 </a></li>
                                </ul>
                                <input type="text" class="form-control disabled" aria-label="Text input with dropdown button" value=' Agregar a la Bolsa' disabled>
                            </div>

                            <div>
                                <br>
                                <p><strong>Resumen del producto</strong></p>
                                <p style="font-size: 0.8rem; text-align: justify;">Un nuevo poder toma vuelo.El MacBook Air es el notebook más delgado y liviano de Apple, y vuelve completamente renovado por dentro. Gracias al chip M1 de Apple, la CPU es hasta 3,5 veces más rápida y la GPU hasta 5 veces más veloz. </p>

                                <p><strong>Características destacadas:</strong></p>
                                <ul>
                                    <li style="font-size: 0.8rem;">Teclado en Español Latinoamericano</li>
                                    <li style="font-size: 0.8rem;">No tiene ventilador.Trabaja en silencio.</li>
                                    <li style="font-size: 0.8rem;">Pantalla Retina de 13,3"resolución de 2560 x 1600</li>
                                    <li style="font-size: 0.8rem;">Usa tu huella digital para Desbloquear.</li>
                                    <li style="font-size: 0.8rem;">Conectividad: Wi-Fi 6 / Thunderbolt / US</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



            <!--  /***** ESTA ES LA TIENDA *****\ -->
            <div class="row row-cols-1 row-cols-md-3 col-10 mt-5 m-auto g-4" style="text-align: -webkit-center;row-gap: 5vh;">

                <p class="m-0 d-flex"> <strong> También te puede interesar </strong> </p>
                <hr class="w-100 m-auto">

                <div class="col">
                    <div class="card w-75 CustomHover h-100">
                        <img src="Imagenes/Desktop/eCommerce/Producto1.png" class="card-img-top" alt="Producto # 1">
                        <div class="card-body">
                            <h5 class="card-title text-center">MacBook Air de 13" Pulgadas </h5>
                            <p class="card-text text-center">$ 5.239.000</p>
                        </div>
                        <div class="card-footer p-0 Custominvisible">
                            <div class="d-grid col-12 mx-auto">
                                <button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button>
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
                                <button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button>
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
                                <button class="btn ov-btn-slide-bottom" id="liveToastBtn" type="button">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>

        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>