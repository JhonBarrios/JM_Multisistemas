<!-- /***** EQUIPO DE TRABAJO *****\ -->
<div class="equipoTrabajo row justify-content-around w-100 m-auto pt-4 pb-5 text-center" style="background-image: url(Imagenes/Desktop/Union.svg);">
    <h2 class="Titulos col-10">Nuestro equipo de trabajo</h2>

    <div class="carousel">
        <div class="carousel__contenedor">
            <button aria-label="Anterior" class="carousel__anterior">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="carousel__lista">
                <?php
                    include_once "Administrador/db.php";
                    $con = mysqli_connect($Host, $Username, $Password, $dbName);
                    $datos = "SELECT * FROM equipo";
                    $consultae = mysqli_query($connexion, $datos);
                    while ($mostrardatos = mysqli_fetch_array($consultae)) {
                ?>
                    <div class="carousel__elemento">
                        <img class="mb-3" src="data:<?php echo $mostrardatos['Tipo_Img']; ?>;base64,<?php echo base64_encode($mostrardatos['Img']); ?>" alt="Integrante <?php echo $mostrardatos['Nombre']; ?>">
                        <b class="d-block"><?php echo $mostrardatos['Cargo']; ?></b>
                        <p><?php echo $mostrardatos['Nombre']; ?></p>
                    </div>
                <?php } ?>
            </div>

            <button aria-label="Siguiente" class="carousel__siguiente">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div role="tablist" class="carousel__indicadores"></div>
    </div>
</div>