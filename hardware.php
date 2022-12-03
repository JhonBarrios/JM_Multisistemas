<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>

        <!-- /***** BANNER *****\ -->
        <div class="Banner row align-items-center row-col-12" style="background-image: url(Imagenes/Desktop/Hardware.png); background-position: bottom;">
            <div class="col-12">
                <h1 class="fw-bold text-white">Hardware y software</h1>
            </div>
        </div>

        <!-- /***** SOLUCIONES TECNOLOGICAS *****\ -->
        <div class="row col-12 align-content-center justify-content-around" >
            <!-- Primera Sección -->
            <div class="row col-12" style="height: 50vh; display: flex; align-items: center; align-content: center; flex-direction: row; overflow: hidden;">
                <div class="d-sm-none d-md-block col-md-2">
                    <img src="Imagenes/Desktop/Puntos.png" class="w-100" alt="Puntos">
                </div>

                <div class="col-sm-6 col-md-4 ml-sm-3">
                    <h2 class="fw-bold mb-4">Hardware infraestructura</h2>
                    <ul>
                        <li>Servidores y almacenamiento</li>
                        <li>Potencia (UPS)</li>
                        <li>Conectividad</li>
                        <li>CC y comunicaciones</li>
                    </ul>
                </div>

                <div class="col-sm-6 col-md-6 d-block position-relative">
                    <img src="Imagenes/Desktop/Hardware/1.1.jpg" alt="" class="position-absolute" style="height: 35vh; width: 35vw; top: -9.4rem; left: 2.5rem; object-fit: cover;">
                    <img src="Imagenes/Desktop/Hardware/1.jpg" alt="" class="position-absolute" style="height: 35vh; width: 35vw; top: -7rem; object-fit: cover;">
                </div>
            </div>

            <!-- Segunda Sección -->
            <div class="row col-12 flex-row-reverse" style="height: 50vh; display: flex; align-items: center; align-content: center; flex-direction: row; overflow: hidden;">
                <div class="col-2">
                    <img src="Imagenes/Desktop/Puntos.png" class="w-100" alt="Puntos">
                </div>

                <div class="col-4">
                    <h2 class="fw-bold mb-4">Hardware</h2>
                    <ul>
                        <li>Accesorios, partes y periféricos</li>
                        <li>Cómputo, impresión y suministros</li>
                        <li>Multimedia</li>
                        <li>Movilidad: tablets y celulares</li>
                    </ul>
                </div>

                <div class="col-6 d-block position-relative">
                    <img src="Imagenes/Desktop/Hardware/2.1.jpg" alt="" class="position-absolute" style="height: 35vh; width: 35vw; top: -9.4rem; left: 4.5rem; object-fit: cover;">
                    <img src="Imagenes/Desktop/Hardware/2.jpg" alt="" class="position-absolute" style="height: 35vh; width: 35vw; top: -7rem; left: 7rem; object-fit: cover;">
                </div>
            </div>

            <!-- Tercera Sección -->
            <div class="row col-12" style="height: 50vh; display: flex; align-items: center; align-content: center; flex-direction: row; overflow: hidden;">
                <div class="col-2">
                    <img src="Imagenes/Desktop/Puntos.png" class="w-100" alt="Puntos">
                </div>

                <div class="col-4">
                    <h2 class="fw-bold mb-4">Software</h2>
                    <ul>
                        <li>Microsfot 365, colaboración y productividad.</li>
                        <li>Seguridad y diseño</li>
                    </ul>
                </div>

                <div class="col-6 d-block position-relative">
                    <img src="Imagenes/Desktop/Hardware/3.1.jpg" alt="" class="position-absolute" style="height: 35vh; width: 35vw; top: -9.4rem; left: 2.5rem; object-fit: cover;">
                    <img src="Imagenes/Desktop/Hardware/3.jpg" alt="" class="position-absolute" style="height: 35vh; width: 35vw; top: -7rem; object-fit: cover;">
                </div>
            </div>
        </div>

        <div class="row mb-5 mt-5 m-auto col-8 align-content-center" >
            <h2 class="mb-3 fw-bold text-center">FABRICANTES ALIADOS:</h2>
            <p class="text-justify">En alianza con los mas reconocidos fabricantes de software y hardware en JM Multisistemas Respaldamos todos nuestros productos y servicios llevando a su empresa soluciones tecnológicas alineadas con su negocio. A continuación compartimos las principales marcas en sus diferentes categorías de Hardware de infraestructura, hardware de computo y software.</p>

            <img src="Imagenes/Desktop/Hardware/HardwareInfraestructura.png" alt="Hardware Infraestructura">
            <img src="Imagenes/Desktop/Hardware/Hardware_2.png" alt="Hardware">
            <img src="Imagenes/Desktop/Hardware/Software.png" alt="Software">
        </div>

        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>
        
        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>