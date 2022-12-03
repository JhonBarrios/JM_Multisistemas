<!-- /***** NUESTROS CLIENTES *****\ -->
<div class="Nuestrosclietnes position-relative row">
    <h2 class="Titulos col-10">Nuestros Clientes</h2>

    <div class="textcliente col-12">
        <div class="text1 col-6">
            <h3>Comerciales</h3>
            <h3>Gobierno</h3>
        </div>
        <div class="text2 col-6">
            <h3>Educación</h3>
            <h3>Salud</h3>
        </div>
    </div>

    <div class="text-center justify-content-around row d-flex row-cols-12" style="width: 80%;">
        <?php
        include_once "Administrador/db.php";
        $con = mysqli_connect($Host, $Username, $Password, $dbName);
        $datos = "SELECT * FROM Clientes LIMIT 0,5";
        $consultae = mysqli_query($connexion, $datos);
        while ($mostrardatos = mysqli_fetch_array($consultae)) {
        ?>
            <img class="imgclienteslogo col-6 col-sm-4 col-md-4 col-lg-4 col-xl-2 p-3 p-sm-3 p-md-4 p-lg-4" src="data:<?php echo $mostrardatos['T_Img']; ?>;base64,<?php echo base64_encode($mostrardatos['Img_Cliente']); ?>" alt="Cliente <?php echo $mostrardatos['Nombre']; ?>">
        <?php } ?>
    </div>
</div>