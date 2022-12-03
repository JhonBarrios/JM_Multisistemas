<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>

        <!-- /***** BANNER *****\ -->
        <div class="Banner Bann row align-items-center row-col-12" style="background-image: url(Imagenes/Desktop/Contacto.png);">
            <div class="Deg col-12">
                <h1 class="fw-bold TextSomos p-0 title">¿Necesitas más información?</h1>
                <h3 class="fw-bold TextSomos p-0 sub">Déjanos tus datos y nos comunicaremos contigo</h3>
            </div>
        </div>    
        
        
        <!-- /***** FORMULARIO CONTACTANOS *****\ -->
        <div class="Contactanos row align-content-center justify-content-around" style="background-image: url(Imagenes/Desktop/Puntos.svg);">
            <div class="col-10 col-sm-8 col-md-6 p-4 formulario">
                <form class="row g-3" action="contactenos.php" method="POST">

                    <div class="form-floating pb-3 col-12">
                        <input type="text" class="form-control" id="floatingInput" name="nombre" placeholder="Nombre" required>
                        <label id="TextAuto" for="floatingInput">Nombre Completo</label>
                        <div class="valid-feedback">
                            Esta bien !
                        </div>
                    </div>

                    <div class="form-floating pb-3 col-12">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                        <label id="TextAuto" for="floatingInput">Email</label>
                        <div class="valid-feedback">
                            Esta bien !
                        </div>
                    </div>

                    <div class="form-floating pb-3 col-12">
                        <input type="number" class="form-control" id="floatingInput" name="numero" placeholder="Número telefónico" required>
                        <label id="TextAuto" for="floatingInput">Número telefónico</label>
                        <div class="valid-feedback">
                            Esta bien !
                        </div>
                    </div>

                    <div class="form-floating pb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name="mensaje" id="floatingTextarea" style="height: 100px"></textarea>
                        <label id="TextAuto" for="floatingTextarea">Mensaje</label>
                    </div>

                    <div class="col-12 pb-3">
                      <div class="form-check">
                        <input class="form-check-input is-invalid" type="checkbox" name="invalidCheck3" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                        <label class="form-check-label" id="TextAuto" for="invalidCheck3">
                            Aceptar tratamiento de datos personales 
                        </label>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary" name="submit_form" type="submit">Enviar</button>
                    </div>
                  </form>
            </div>
        </div>
                
        <!--  /***** INCLUDE DEL MAPA *****\ -->
        <?php include('Include_Maps.php'); ?>

        <!-- /***** INCLUDE DEL FOOTER *****\ -->
        <?php include('Include_footer.php'); ?>

        <!-- /***** INCLUDE DEL ENCABEZADO MINI *****\ -->
        <?php include('Include_encabezadoP.php'); ?>

        <!-- /***** INCLUDE DEL FINAL DEL DOCUMENTO *****\ -->
        <?php include('Include_fin-Documento.php'); ?>