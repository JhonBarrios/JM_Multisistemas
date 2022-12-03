<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>


        <!-- /***** BANNER *****\ -->
        <div class="Banner row align-items-center row-col-12" style="background-image: url(Imagenes/Desktop/Servicios.png);">
            <div class="col-12">
                <h1 class="fw-bold text-white">Servicios técnologicos</h1>
            </div>
        </div>

        <!-- /***** SERVICIOS GENERALES *****\ -->
        <div class="ServiciosGenerales row align-content-center justify-content-around" style="background-image: url(Imagenes/Desktop/Puntos.svg);">
            <div class="contentidoServicios row col-10" style="background-color: transparent">
                <!-- <div class="col-10 col-xs-10 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4"> -->

                <div class="Tarjeta" onclick="mostrar()">
                    <div class="CardS">
                        <svg class="iconSVGS" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22 0H2a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6 16a1 1 0 1 1 1-1a1.001 1.001 0 0 1-1 1ZM22 6h-2.184a3 3 0 1 0 0 2H22v4h-4v2h4v2h-2v2h2v4h-8v-1.184a3 3 0 1 0-2 0V22H7v-4.184a3 3 0 1 0-2 0V22H2V2h4v6h2V2h2v10h2V2h10Zm-4 1a1 1 0 1 1-1-1a1.001 1.001 0 0 1 1 1Z" />
                        </svg>
                        <p class="TextSer">Servidores</p>
                    </div>
                </div>

                <!-- </div> -->

                <!-- <div class="col-10 col-xs-10 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4"> -->
                <div class="Tarjeta" onclick="mostrar1()">
                    <div class="CardS">
                        <svg class="iconSVGS" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M2 21V3h18v4h2v2h-2v2h2v2h-2v2h2v2h-2v4Zm2-2h14V5H4Zm2-2h5v-4H6Zm6-7h4V7h-4Zm-6 2h5V7H6Zm6 5h4v-6h-4Zm-8 2V5v14Z" />
                        </svg>
                        <p class="TextSer">Soporte de primer nivel</p>
                    </div>
                </div>
                <!-- </div> -->

                <!-- <div class="col-10 col-xs-10 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4"> -->
                <div class="Tarjeta" onclick="mostrar2()">
                    <div class="CardS">
                        <svg class="iconSVGS" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 23v-4.2H1V6h2V2q0-.425.288-.713Q3.575 1 4 1t.713.287Q5 1.575 5 2v4h2v12.8H5V23Zm8 0v-4.2H9V6h2V2q0-.425.288-.713Q11.575 1 12 1t.713.287Q13 1.575 13 2v4h2v12.8h-2V23Zm8 0v-4.2h-2V6h2V2q0-.425.288-.713Q19.575 1 20 1t.712.287Q21 1.575 21 2v4h2v12.8h-2V23ZM3 8v4h2V8Zm8 0v4h2V8Zm8 0v4h2V8ZM3 17h2v-3H3Zm8 0h2v-3h-2Zm8 0h2v-3h-2ZM4 13Zm8 0Zm8 0ZM3 12h2h-2Zm8 0h2h-2Zm8 0h2h-2ZM3 14h2Zm8 0h2Zm8 0h2Z" />
                        </svg>
                        <p class="TextSer">Redes</p>
                    </div>
                </div>
                <!-- </div> -->
            </div>



            <div class="row col-8" style="margin-top: 15rem;">

                <div id="Servidores">
                    <h4 class="text-decoration-underline">Servidores</h4>
                    <p>Mediante la implementación de las mejores prácticas, aseguramos que nuestras soluciones sigan operando correctamente durante su ciclo de vida, garantizando así minimizar los tiempos de caída de las soluciones de servidores y almacenamiento</p>
                    <!-- <img src="Imagenes/Desktop/Servicios/Marcas.png" alt="Marcas"> -->
                </div>

                <div id="Soporte">
                    <h4 class="text-decoration-underline">Soporte de Primer Nivel</h4>
                    <p>Proveemos servicios de soporte técnico preventivo, correctivo e implementación de soluciones en las marcas más reconocidas del mercado de TI de computo e impresión</p>
                </div>

                <div id="Redes">
                    <h4 class="text-decoration-underline">Redes</h4>
                    <p>Llevando a la practica, la optimización de los centros de datos actuales o ayudando en la selección de las tecnologías adecuadas para la distribución o acceso de usuarios y que garanticen la conectividad de nuestros cliente</p>
                </div>
            </div>

        </div>

        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>

        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>