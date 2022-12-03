<!DOCTYPE html>
<html lang="es">
<!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
<?php include('Include_head.php'); ?>

<body>
    <div class="container-fluid p-0 m-0">
        <!--  /***** ESTE ES EL HEAD DEL HTML *****\ -->
        <?php include('Include_encabezadoG.php'); ?>

        <div class="mt-5 mb-5">
            <h3 class="Precio col-10 m-auto pt-5 pb-5">Carrito de compras</h3>
            <div class="col-10 m-auto">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Envio</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><img src="Imagenes/Desktop/eCommerce/Producto1.png" class="w-25" alt="Imagen del Producto"> - MacBook Air de 13" Pulgadas</th>
                            <td>a calcular</td>
                            <td>$ 5.239.000</td>
                            <td>1</td>
                            <td>a calcular</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="container col-10 mt-5">
                <div class="row mt-4 justify-content-end">
                    <div class="col-3 text-right">
                        <div class="col-12 mb-4 text-center fw-bold p-2 bg-light text-dark border border-secondary">Resumen de Compra</div>
                        <div class="col-12 text-center d-flex justify-content-around align-middle">
                            <p class="m-0">SubTotal</p>
                            <p class="m-0">$ 5.239.000</p>
                        </div>
                        <hr class="w-75 m-auto mt-2 mb-2">
                        <div class="col-12 text-center d-flex justify-content-around align-middle fw-bold">
                            <p class="m-0">Total</p>
                            <p class="m-0">$ 5.239.000</p>
                        </div>
                        <div class="col-12 mt-4 text-center"><button class="btn btn-primary w-100" type="submit">Finalizar Compra</button></div>
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