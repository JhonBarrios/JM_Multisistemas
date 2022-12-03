<?php

include("db.php");

/*----------------------------------------------------------------------
--                                                                    --
                SECCIÓN DE LOS DATOS DEL ADMINISTRADOR
--                                                                    --
-----------------------------------------------------------------------*/

//Login
if (isset($_POST["btningresar"])) {
  $user = $_POST["user"];
  $password = $_POST["password"];

  $query = mysqli_query($connexion, "SELECT * FROM acceso_administrador WHERE Usuario = '$user' AND Contraseña= '$password'");
  $nr = mysqli_num_rows($query);

  $datos = "SELECT * FROM acceso_administrador WHERE Usuario = '$user'";
  $consulta = mysqli_query($connexion, $datos);

  while ($mostrar = mysqli_fetch_array($consulta)) {

    $nombre_usuario = $mostrar['Nombre'];

    if ($nr == 1) {
      echo "<script> alert('Bienvenido(a) $nombre_usuario'); window.location='admin-area.php' </script>";
    } else {
      echo "<script> alert('Este usuario no existe, por favor comprobar'); window.location='Index.php' </script>";
    }
  }
}
// Datos de Ingreso
if (isset($_POST["actualizar_adm"])) {
  $ID = $_POST["ID"];
  $nombre = $_POST["New_Nombre"];
  $user = $_POST["New_Usuario"];
  $password = $_POST["New_Contraseña"];
  $email = $_POST["New_Correo"];

  $actualizar = "UPDATE acceso_administrador SET Nombre='$nombre',Usuario='$user',Contraseña='$password',Correo='$email' WHERE ID_Admin = '$ID'";
  $requerimiento = mysqli_query($connexion, $actualizar);
  if ($requerimiento) {
    echo "<script>alert('Se han actualizado los valores con exito'); window.location='listar_adm.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
  }
}

/*----------------------------------------------------------------------
--                                                                    --
            SECCIÓN DE LA SECCION CORRESPONDIENTE A LOS BLOGS
--                                                                    --
-----------------------------------------------------------------------*/

// Código para Insertar Blogs 
if (isset($_REQUEST['submit-photo'])) {
  if (isset($_FILES['foto']['name'])) {
    $tipoArchivo = $_FILES['foto']['type'];
    $nombreArchivo = $_FILES['foto']['name'];
    $tamanoArchivo = $_FILES['foto']['size'];
    $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);
    include_once "db.php";
    $con = mysqli_connect($Host, $Username, $Password, $dbName);
    $binariosImagen = mysqli_escape_string($con, $binariosImagen);

    $Categoria = $_POST["Categoria"];
    $TituloBlog = $_POST["TituloBlog"];
    $ContBlog = $_POST["ContBlog"];
    $Tiempo = $_POST["Tiempo"];
    $Creado = date('Y-m-d');

    $query = "INSERT INTO blog (NombreImg,Imagenes,Tipo,Creado,Categoria,TituloBlog,ContBlog,Tiempo,Destacado) values ('$nombreArchivo','$binariosImagen','$tipoArchivo','$Creado','$Categoria','$TituloBlog','$ContBlog','$Tiempo','$_REQUEST[DestacadoCheck]')";

    $res = mysqli_query($con, $query);

    if ($res) {
      echo "<script>alert('Registro insertado correctamente'); window.location='admin-area.php';</script>";
    } else {
      echo "<script>alert('Ocurrio un error al subir la historia en el Blog'); window.history.go(-1);</script>";
    }
  }
}
// Codigo para eliminar Blogs de la Página //
if (isset($_POST["eliminar_img"])) {
  $photoID = $_POST['Id_Item'];

  echo ("<script>console.log('Id de la Foto Seleccionada: " . $photoID . "');</script>");

  $sql = "DELETE FROM blog WHERE Id_Item = $photoID";

  $exc = mysqli_query($connexion, $sql);

  $reset_Auto = "ALTER TABLE `blog` DROP Id_Item";
  $reset_autoincrement = mysqli_query($connexion, $reset_Auto);
  $reset_Auto2 = "ALTER TABLE `blog` AUTO_INCREMENT = 1";
  $reset_autoincrement2 = mysqli_query($connexion, $reset_Auto2);
  $reset_Auto3 = "ALTER TABLE `blog` ADD Id_Item int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
  $reset_autoincrement3 = mysqli_query($connexion, $reset_Auto3);

  if ($exc) {
    echo "<script>alert('Blog eliminado con exito'); window.location='Blog_Borrar.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al eliminar el Blog - Error <?php echo mysqli_error($con); ?>'); window.history.go(-1);</script>";
  }
}

/*----------------------------------------------------------------------
--                                                                    --
                   SECCIÓN DE CONTACTANOS
--                                                                    --
-----------------------------------------------------------------------*/

// Datos de mod_contactanos
if (isset($_POST["actualizar_contact"])) {
  $nuevo_correo = $_POST["New_Correo"];

  $actualizarcorreo = "UPDATE contacto SET Correo_Autorizado='$nuevo_correo'";

  $requerimientocorreo = mysqli_query($connexion, $actualizarcorreo);

  if ($requerimientocorreo) {
    echo "<script>alert('Se ha actualizado el correo autorizado'); window.location='mod_contactanos.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
  }
}

/*----------------------------------------------------------------------
--                                                                    --
                   SECCIÓN DE LA TIENDA
--                                                                    --
-----------------------------------------------------------------------*/

// Datos para subir productos a la tienda
if (isset($_POST["Subir-Producto"])) {
  $Name = $_POST["NameProduct"];
  $Descripcion = $_POST["Des_Pro"];
  $Stock = $_POST["Stock"];
  $Precio = $_POST["Precio"];
  $Creado = date('Y-m-d');

  //Insertar imagen en la base de datos
  $queryinsertar = "INSERT INTO ecommercelocal (Id_Pro, Nom_Ref, Descripcion_Pro, Stock, Precio_Venta, Creado) VALUES ('' , '$Name' , '$Descripcion' , '$Stock' , '$Precio' , '$Creado')";

  $insertar = mysqli_query($connexion, $queryinsertar);
  // COndicional para verificar la subida del fichero
  if ($insertar) {
    echo "<script>alert('Articulo Subido Correctamente.'); window.location='Tienda_Subir.php';</script>";
  } else {
    echo "<script>alert('Ha fallado la subida, reintente nuevamente.'); window.history.go(-1);</script>";
  }
}
// Datos para subir las imagenes de los productos a la tienda
if (isset($_POST["Subir-Producto-Img"])) {

  $ID_T = $_REQUEST['Id'];
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if ($check !== false) {
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    $insert1 = "INSERT INTO ecommerceimg (Id_Img, Id_Padre, Nombre) VALUES ('', '$ID_T', '$imgContent')";
    $insert = mysqli_query($connexion, $insert1);

    if ($insert) {
      echo "<script>alert('Imagen Subida Correctamente.'); window.location='Tienda_Subir_img.php?Id=$ID_T';</script>";
    } else {
      echo "File upload failed, please try again.";
    }
  } else {
    echo "Please select an image file to upload.";
  }
}

/*----------------------------------------------------------------------
--                                                                    --
                   SECCIÓN DE SUSCRIPCIONES
--                                                                    --
-----------------------------------------------------------------------*/

// Datos para suscribirse a la web
if (isset($_POST["suscripcion"])) {
  $Mail = $_POST["email"];
  $Name = $_POST["nombre"];

  $querysub = "INSERT INTO suscripcion (Id_Sub, email, nombre) VALUES ('' , '$Mail' , '$Name')";
  $insertar = mysqli_query($connexion, $querysub);

  if ($insertar) {
    echo "<script>alert('Suscripción realizada con exito !!'); window.location='../index.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al suscribirse, por favor intentalo mas tarde, Gracias !'); window.history.go(-1);</script>";
  }
}

/*----------------------------------------------------------------------
--                                                                    --
                   SECCIÓN DE INTEGRANTES DEL EQUIPO
--                                                                    --
-----------------------------------------------------------------------*/

// Código para Insertar Integrantes
if (isset($_REQUEST['submit-integrante'])) {
  if (isset($_FILES['foto']['name'])) {
    $tipoArchivo = $_FILES['foto']['type'];
    $nombreArchivo = $_FILES['foto']['name'];
    $tamanoArchivo = $_FILES['foto']['size'];
    $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);

    include_once "db.php";
    $con = mysqli_connect($Host, $Username, $Password, $dbName);
    $binariosImagen = mysqli_escape_string($con, $binariosImagen);

    $Nombre = $_POST["Nombre"];
    $Cargo = $_POST["Cargo"];

    $query = "INSERT INTO equipo (Id_Integrante,Nombre,Cargo,Nombre_Img,Img,Tipo_Img) values ('','$Nombre','$Cargo','$nombreArchivo','$binariosImagen','$tipoArchivo')";

    $res = mysqli_query($con, $query);

    if ($res) {
      echo "<script>alert('Integrante ingresado correctamente'); window.location='listar_equipo.php';</script>";
    } else {
      echo "<script>alert('Ocurrio un error al ingresar el integrante'); window.history.go(-1);</script>";
    }
  }
}
// Código para actualizar Integrante
if (isset($_REQUEST['mod-integrante'])) {

  $ID_T = $_POST['Id'];
  $Nombre = $_POST["Nombre"];
  $Cargo = $_POST["Cargo"];

  include_once "db.php";
  $con = mysqli_connect($Host, $Username, $Password, $dbName);

  $query = "UPDATE equipo SET Nombre='$Nombre', Cargo='$Cargo' WHERE Id_Integrante = '$ID_T'";

  $res = mysqli_query($con, $query);

  if ($res) {
    echo "<script>alert('Integrante modificado correctamente'); window.location='listar_equipo.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al actualizar el integrante'); window.history.go(-1);</script>";
  }
}
// Código para eliminar Integrante
if (isset($_REQUEST['Del-integrante'])) {
  $ID_T = $_POST['Id'];

  include_once "db.php";
  $con = mysqli_connect($Host, $Username, $Password, $dbName);

  $query = "DELETE FROM equipo WHERE Id_Integrante = '$ID_T'";

  $res = mysqli_query($con, $query);

  $reset_Auto = "ALTER TABLE `equipo` DROP Id_Integrante";
      $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
    $reset_Auto2 = "ALTER TABLE `equipo` AUTO_INCREMENT = 1";
      $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
    $reset_Auto3 ="ALTER TABLE `equipo` ADD Id_Integrante int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);

  if ($res) {
    echo "<script>alert('Integrante eliminado'); window.location='listar_equipo.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al eliminar al integrante'); window.history.go(-1);</script>";
  }
}

/*----------------------------------------------------------------------
--                                                                    --
                   SECCIÓN DE LOS CLIENTES
--                                                                    --
-----------------------------------------------------------------------*/

// Código para Insertar clientes
if (isset($_REQUEST['submit-cliente'])) {
  if (isset($_FILES['foto']['name'])) {
    $tipoArchivo = $_FILES['foto']['type'];
    $nombreArchivo = $_FILES['foto']['name'];
    $tamanoArchivo = $_FILES['foto']['size'];
    $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);

    include_once "db.php";
    $con = mysqli_connect($Host, $Username, $Password, $dbName);
    $binariosImagen = mysqli_escape_string($con, $binariosImagen);

    $Nombre = $_POST["Nombre"];
    $Sector = $_POST['inputGroupSelect01'];

    $query = "INSERT INTO clientes (Id_Cliente,Nombre,Sector,N_Img,Img_Cliente,T_Img) values ('','$Nombre','$Sector','$nombreArchivo','$binariosImagen','$tipoArchivo')";

    $res = mysqli_query($con, $query);

    if ($res) {
      echo "<script>alert('Cliente ingresado correctamente'); window.location='Clientes.php';</script>";
    } else {
      echo "<script>alert('Ocurrio un error al ingresar al Cliente'); window.history.go(-1);</script>";
    }
  }
}
// Código para actualizar clientes
if (isset($_REQUEST['mod-clientes'])) {

  $ID_T = $_POST['Id'];
  $Nombre = $_POST["Nombre"];
  $Sector = $_POST['inputGroupSelect01'];

  include_once "db.php";
  $con = mysqli_connect($Host, $Username, $Password, $dbName);

  $query = "UPDATE clientes SET Nombre='$Nombre', Sector='$Sector' WHERE Id_Cliente = '$ID_T'";

  $res = mysqli_query($con, $query);

  if ($res) {
    echo "<script>alert('Cliente modificado correctamente'); window.location='Clientes.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al actualizar el cliente'); window.history.go(-1);</script>";
  }
}
// Código para eliminar cliente
if (isset($_REQUEST['Del-cliente'])) {
  $ID_T = $_POST['Id'];

  include_once "db.php";
  $con = mysqli_connect($Host, $Username, $Password, $dbName);

  $query = "DELETE FROM clientes WHERE Id_Cliente = '$ID_T'";

  $res = mysqli_query($con, $query);

  $reset_Auto = "ALTER TABLE `clientes` DROP Id_Cliente";
      $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
    $reset_Auto2 = "ALTER TABLE `clientes` AUTO_INCREMENT = 1";
      $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
    $reset_Auto3 ="ALTER TABLE `clientes` ADD Id_Cliente int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);

  if ($res) {
    echo "<script>alert('Cliente eliminado'); window.location='Clientes.php';</script>";
  } else {
    echo "<script>alert('Ocurrio un error al eliminar al cliente'); window.history.go(-1);</script>";
  }
}

/*----------------------------------------------------------------------
--                                                                    --
                   SECCIÓN DE SOMOS JM
--                                                                    --
-----------------------------------------------------------------------*/
// Código para Insertar información a Somos JM
if (isset($_REQUEST['Subir-JM'])) {
  if (isset($_FILES['foto']['name'])) {
    $tipoArchivo = $_FILES['foto']['type'];
    $nombreArchivo = $_FILES['foto']['name'];
    $tamanoArchivo = $_FILES['foto']['size'];
    $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);

    include_once "db.php";
    $con = mysqli_connect($Host, $Username, $Password, $dbName);
    $binariosImagen = mysqli_escape_string($con, $binariosImagen);

    $Des_Jm = $_POST["Des_Jm"];

    $Del = "TRUNCATE bd_jm.somos";
    $Delete = mysqli_query($con, $Del);

    $query = "INSERT INTO somos (Id_JM,Texto,N_Img,Img_JM,T_Img) values ('','$Des_Jm','$nombreArchivo','$binariosImagen','$tipoArchivo')";
    $res = mysqli_query($con, $query);

    if ($res) {
      echo "<script>alert('Información ingresada correctamente'); window.location='SomosJM.php';</script>";
    } else {
      echo "<script>alert('Ocurrio un error al ingresar la información'); window.history.go(-1);</script>";
    }
  }
}

?>

































<?php


/*
// Datos de la certificacion_adr
if(isset($_POST["actualizar_cer"])) {
  $ID_Cer1 = $_POST["ID_Cer1"]; $ID_Cer2 = $_POST["ID_Cer2"]; $ID_Cer3 = $_POST["ID_Cer3"];
  $ID_Cer4 = $_POST["ID_Cer4"]; $ID_Cer5 = $_POST["ID_Cer5"]; $ID_Cer6 = $_POST["ID_Cer6"];
  $ID_Cer7 = $_POST["ID_Cer7"]; $ID_Cer8 = $_POST["ID_Cer8"]; $ID_Cer9 = $_POST["ID_Cer9"];
  $ID_Cer10 = $_POST["ID_Cer10"]; $ID_Cer11 = $_POST["ID_Cer11"]; $ID_Cer12 = $_POST["ID_Cer12"];
  $ID_Cer13 = $_POST["ID_Cer13"]; $ID_Cer14 = $_POST["ID_Cer14"]; $ID_Cer15 = $_POST["ID_Cer15"];

  $cer1 = $_POST["New_Cer1"]; $cer2 = $_POST["New_Cer2"]; $cer3 = $_POST["New_Cer3"]; $cer4 = $_POST["New_Cer4"];
  $cer5 = $_POST["New_Cer5"]; $cer6 = $_POST["New_Cer6"]; $cer7 = $_POST["New_Cer7"]; $cer8 = $_POST["New_Cer8"];
  $cer9 = $_POST["New_Cer9"]; $cer10 = $_POST["New_Cer10"]; $cer11 = $_POST["New_Cer11"]; $cer12 = $_POST["New_Cer12"];
  $cer13 = $_POST["New_Cer13"]; $cer14 = $_POST["New_Cer14"]; $cer15 = $_POST["New_Cer15"];

  $actualizar1 = "UPDATE certificacion_adr SET Texto='$cer1' WHERE Numero = '$ID_Cer1'";
  $requerimiento1 = mysqli_query($connexion,$actualizar1);

  $actualizar2 = "UPDATE certificacion_adr SET Texto='$cer2' WHERE Numero = '$ID_Cer2'";
  $requerimiento2 = mysqli_query($connexion,$actualizar2);

  $actualizar3 = "UPDATE certificacion_adr SET Texto='$cer3' WHERE Numero = '$ID_Cer3'";
  $requerimiento3 = mysqli_query($connexion,$actualizar3);

  $actualizar4 = "UPDATE certificacion_adr SET Texto='$cer4' WHERE Numero = '$ID_Cer4'";
  $requerimiento4 = mysqli_query($connexion,$actualizar4);

  $actualizar5 = "UPDATE certificacion_adr SET Texto='$cer5' WHERE Numero = '$ID_Cer5'";
  $requerimiento5 = mysqli_query($connexion,$actualizar5);

  $actualizar6 = "UPDATE certificacion_adr SET Texto='$cer6' WHERE Numero = '$ID_Cer6'";
  $requerimiento6 = mysqli_query($connexion,$actualizar6);

  $actualizar7 = "UPDATE certificacion_adr SET Texto='$cer7' WHERE Numero = '$ID_Cer7'";
  $requerimiento7 = mysqli_query($connexion,$actualizar7);

  $actualizar8 = "UPDATE certificacion_adr SET Texto='$cer8' WHERE Numero = '$ID_Cer8'";
  $requerimiento8 = mysqli_query($connexion,$actualizar8);

  $actualizar9 = "UPDATE certificacion_adr SET Texto='$cer9' WHERE Numero = '$ID_Cer9'";
  $requerimiento9 = mysqli_query($connexion,$actualizar9);

  $actualizar10 = "UPDATE certificacion_adr SET Texto='$cer10' WHERE Numero = '$ID_Cer10'";
  $requerimiento10 = mysqli_query($connexion,$actualizar10);

  $actualizar11 = "UPDATE certificacion_adr SET Texto='$cer11' WHERE Numero = '$ID_Cer11'";
  $requerimiento11 = mysqli_query($connexion,$actualizar11);

  $actualizar12 = "UPDATE certificacion_adr SET Texto='$cer12' WHERE Numero = '$ID_Cer12'";
  $requerimiento12 = mysqli_query($connexion,$actualizar12);

  $actualizar13 = "UPDATE certificacion_adr SET Texto='$cer13' WHERE Numero = '$ID_Cer13'";
  $requerimiento13 = mysqli_query($connexion,$actualizar13);

  $actualizar14 = "UPDATE certificacion_adr SET Texto='$cer14' WHERE Numero = '$ID_Cer14'";
  $requerimiento14 = mysqli_query($connexion,$actualizar14);

  $actualizar15 = "UPDATE certificacion_adr SET Texto='$cer15' WHERE Numero = '$ID_Cer15'";
  $requerimiento15 = mysqli_query($connexion,$actualizar15);

if ($requerimiento15) {
  echo "<script>alert('Se han actualizado los valores con exito'); window.location='mod_certificacion_adr.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
}}


// Datos para actualizar la Junta Directiva
if(isset($_POST["actualizar_jun"])) {

  foreach ($_POST['ID_Jun'] as $idJ) {
    $editID = mysqli_real_escape_string($connexion, $_POST['ID_Jun'][$idJ]);
    $Name_P = mysqli_real_escape_string($connexion, $_POST['New_JunP'][$idJ]);
    $Cargo_P = mysqli_real_escape_string($connexion, $_POST['New_CJunP'][$idJ]);
    $Name_S = mysqli_real_escape_string($connexion, $_POST['New_JunS'][$idJ]);
    $Cargo_S = mysqli_real_escape_string($connexion, $_POST['New_CJunS'][$idJ]);

    $actualizardate=$connexion->query("UPDATE junta_directiva SET ID_Junta = '$editID', Principales = '$Name_P', Cargo_P = '$Cargo_P', Suplentes = '$Name_S', Cargo_S = '$Cargo_S' WHERE ID_Junta = '$idJ'");
  }

if ($actualizardate) {
  echo "<script>alert('Se han actualizado los valores con exito'); window.location='mod_junta.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
}}


// Agregar Dato a la Junta Directiva
if(isset($_POST["Nuevo_jun"])) {
  $Nuevo_Principal = $_POST["New_JunPN"];
  $Nuevo_CPrincipal = $_POST["New_CJunPN"];
  $Nuevo_Suplente = $_POST["New_JunSN"];
  $Nuevo_CSuplente = $_POST["New_CJunSN"];

  $addJunta = "INSERT INTO junta_directiva (ID_Junta, Principales, Cargo_P, Suplentes, Cargo_S) VALUES ('','$Nuevo_Principal','$Nuevo_CPrincipal','$Nuevo_Suplente','$Nuevo_CSuplente')";

  $addJuntaD = mysqli_query($connexion,$addJunta);

if ($addJuntaD) {
  echo "<script>alert('Se ha agregado el dato correctamente'); window.location='mod_junta.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al agregar los datos'); window.history.go(-1);</script>";
}}





// Datos del Director General
if(isset($_POST["actualizar_DirG"])) {
  $id_director = $_POST["ID_Director"];
  $director = $_POST["Director"];
  $director_cargo = $_POST["Director_Cargo"];

  $actualizarDirector = "UPDATE direccion_general_director SET Nombre_Persona='$director', Cargo='$director_cargo' WHERE Id_Director = '$id_director'";

  $requerimiento10 = mysqli_query($connexion,$actualizarDirector);

if ($requerimiento10) {
  echo "<script>alert('Se ha actualizado el dato correctamente'); window.location='mod_dir-generalD.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
}}


// Datos de la lista de dirección general
if(isset($_POST["actualizar_Direccion"])) {
  $id_director2 = $_POST["ID_Dir_General_2"]; $id_director3 = $_POST["ID_Dir_General_3"];
  $id_director4 = $_POST["ID_Dir_General_4"]; $id_director5 = $_POST["ID_Dir_General_5"];
  $persona_2 = $_POST["Persona2"]; $persona_3 = $_POST["Persona3"];
  $persona_4 = $_POST["Persona4"]; $persona_5 = $_POST["Persona5"];
  $direccion_cargo2 = $_POST["Cargo2"]; $direccion_cargo3 = $_POST["Cargo3"];
  $direccion_cargo4 = $_POST["Cargo4"]; $direccion_cargo5 = $_POST["Cargo5"];

  $actualizarDireccion2 = "UPDATE direccion_general SET Persona='$persona_2',Cargo='$direccion_cargo2' WHERE ID_Dir_General = '$id_director2'";
  $requerimiento_dir2 = mysqli_query($connexion,$actualizarDireccion2);
  $actualizarDireccion3 = "UPDATE direccion_general SET Persona='$persona_3',Cargo='$direccion_cargo3' WHERE ID_Dir_General = '$id_director3'";
  $requerimiento_dir3 = mysqli_query($connexion,$actualizarDireccion3);
  $actualizarDireccion4 = "UPDATE direccion_general SET Persona='$persona_4',Cargo='$direccion_cargo4' WHERE ID_Dir_General = '$id_director4'";
  $requerimiento_dir4 = mysqli_query($connexion,$actualizarDireccion4);
  $actualizarDireccion5 = "UPDATE direccion_general SET Persona='$persona_5',Cargo='$direccion_cargo5' WHERE ID_Dir_General = '$id_director5'";
  $requerimiento_dir5 = mysqli_query($connexion,$actualizarDireccion5);

if ($requerimiento_dir5) {
  echo "<script>alert('Se han actualizado los datos correctamente'); window.location='mod_dir-general.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
}}




// Datos para actualizar el comite tecnico
if(isset($_POST["actualizar_comite"])) {
  $id_comite1 = $_POST["ID_Comite1"];
  $nombre1 = $_POST["New_Name1"];
  $id_comite2 = $_POST["ID_Comite2"];
  $nombre2 = $_POST["New_Name2"];
  $id_comite3 = $_POST["ID_Comite3"];
  $nombre3 = $_POST["New_Name3"];

    $actualizarcomite1 = "UPDATE comite_tecnico SET Persona_Comite='$nombre1' WHERE ID_Comite = '$id_comite1'";
    $requerimiento_comite1 = mysqli_query($connexion,$actualizarcomite1);

    $actualizarcomite2 = "UPDATE comite_tecnico SET Persona_Comite='$nombre2' WHERE ID_Comite = '$id_comite2'";
    $requerimiento_comite2 = mysqli_query($connexion,$actualizarcomite2);

    $actualizarcomite3 = "UPDATE comite_tecnico SET Persona_Comite='$nombre3' WHERE ID_Comite = '$id_comite3'";
    $requerimiento_comite3 = mysqli_query($connexion,$actualizarcomite3);

if ($requerimiento_comite3) {
  echo "<script>alert('Se han actualizado los datos correctamente'); window.location='mod_com-tecnico.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
}}


// Datos para actualizar el Direccionamiento Estrategico
if(isset($_POST["actualizar_dirE"])) {
  $Mision = $_POST["Mision"];
  $Vision = $_POST["Vision"];

    $actualizarM_V = "UPDATE direccion_estrategica SET Mision='$Mision',Vision='$Vision'";
    $requerimientoM_V = mysqli_query($connexion,$actualizarM_V);

if ($requerimientoM_V) {
  echo "<script>alert('Se ha actualizado la Mision y la Vision Correctamente'); window.location='mod_dir-estrategico.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
}}


// Datos para actualizar la URL de la reseña Historica
if(isset($_POST["actualizar_URL"])) {
  $URL = $_POST["URL"];

    $actualizarURL = "UPDATE reseña SET URL_Iframe='$URL'";
    $requerimientoURL = mysqli_query($connexion,$actualizarURL);

if ($requerimientoURL) {
  echo "<script>alert('Se ha actualizado la URL Correctamente'); window.location='mod_resena.php';</script>";
}else {
  echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
}}


// Agregar informes de gestión mediante la página inf_new.php
if (isset($_POST["new_inf"])) {
  $type = $_POST["type"];
  $year = $_POST["inputYear"];
  $title = $_POST["inputTitle"];
  $note = $_POST["FormControlNote"];
  $item = $_POST["Item"];
  $valor = $_POST["Valor"];

  // Inicio del ingreso para los informes de Gestión
  if ($type == "Informe_G") {
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($item); $i++) {
    $sql = "INSERT INTO informes_gestion_table (Id_table,Tipo_Dato_Tabla,Year,Item,Valor)
       VALUES('', 'Informe_Gestion', '$year', '".$item[$i]."' ,
         '".$valor[$i]."')";
    //Grabamos los datos en la tabla de la base de datos
      $requerimientotable = mysqli_query($connexion,$sql);
    };

    // Funcionamiento para el guardado del archivo en el directorio 
    $formatos = array('.pdf','.doc','.docx');
    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $ext = substr($filename, strrpos($filename, '.'));

    if (in_array($ext, $formatos)) {
      $dir = '../FILES/';
      if(!file_exists($dir)){
          mkdir($dir, 0777, true);
      }
      $new_name_file = $dir . $year .'-'. date('Ymdhis') . $ext;
      if (move_uploaded_file($fileTmpName, $new_name_file)) {
        echo "<script>alert('Se subio correctamente el archivo');</script>";
      }else {
        echo "<script>alert('Ocurrio un error al subir el archivo'); window.history.go(-1);</script>";
      }
    }else {
      echo "<script>alert('Tipo de archivo no permitido, las extensiones permitidas son .pdf'); window.history.go(-1);</script>";
      // , .doc, .docx
    }
    $new_informe = "INSERT INTO informes_gestion (Id_inf, Tipo_Dato, Year, Titulo, Descripcion, Archivo) VALUES ('','Informe_Gestion','$year','$title','$note','$new_name_file')";

    $agregar_inf = mysqli_query($connexion,$new_informe);

    if ($agregar_inf & $requerimientotable) {
      echo "<script>alert('Se han agregado los datos correctamente'); window.location='inf_list.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al agregar los datos'); window.history.go(-1);</script>";
    }
  } // Finalización del ingreso para los informes de Gestión 

  // Inicio del ingreso para los informes de Dirección Ejetutiva
  if ($type == "Informe_DE") {
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($item); $i++) {
    $sql = "INSERT INTO informes_gestion_table (Id_table,Tipo_Dato_Tabla,Year,Item,Valor)
       VALUES('', 'Informe_Gestion', '$year', '".$item[$i]."' ,
         '".$valor[$i]."')";
    //Grabamos los datos en la tabla de la base de datos
      $requerimientotable = mysqli_query($connexion,$sql);
    };

    // Funcionamiento para el guardado del archivo en el directorio 
    $formatos = array('.pdf','.doc','.docx');
    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $ext = substr($filename, strrpos($filename, '.'));

    if (in_array($ext, $formatos)) {
      $dir = '../FILES/';
      if(!file_exists($dir)){
          mkdir($dir, 0777, true);
      }
      $new_name_file = $dir . $year .'-'. date('Ymdhis') . $ext;
      if (move_uploaded_file($fileTmpName, $new_name_file)) {
        echo "<script>alert('Se subio correctamente el archivo');</script>";
      }else {
        echo "<script>alert('Ocurrio un error al subir el archivo'); window.history.go(-1);</script>";
      }
    }else {
      echo "<script>alert('Tipo de archivo no permitido, las extensiones permitidas son .pdf'); window.history.go(-1);</script>";
      // , .doc, .docx
    }
    $new_informe = "INSERT INTO informes_gestion (Id_inf, Tipo_Dato, Year, Titulo, Descripcion, Archivo) VALUES ('','Informe_Direccion-Ejecutiva','$year','$title','$note','$new_name_file')";

    $agregar_inf = mysqli_query($connexion,$new_informe);

    if ($agregar_inf & $requerimientotable) {
      echo "<script>alert('Se han agregado los datos correctamente'); window.location='inf_list.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al agregar los datos'); window.history.go(-1);</script>";
    }
  } // Finalización del ingreso para los informes de Dirección Ejecutiva




  // Inicio del ingreso para los Proyectos
  if ($type == "Proyecto") {
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($item); $i++) {
    $sql = "INSERT INTO informes_gestion_table (Id_table,Tipo_Dato_Tabla,Year,Item,Valor)
       VALUES('', 'Proyecto', '$year', '".$item[$i]."' ,
         '".$valor[$i]."')";
    //Grabamos los datos en la tabla de la base de datos
      $requerimientotable = mysqli_query($connexion,$sql);
    };

    // Funcionamiento para el guardado del archivo en el directorio 
    $formatos = array('.pdf','.doc','.docx');
    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $ext = substr($filename, strrpos($filename, '.'));

    if (in_array($ext, $formatos)) {
      $dir = '../FILES/';
      if(!file_exists($dir)){
          mkdir($dir, 0777, true);
      }
      $new_name_file = $dir . $year .'-'. date('Ymdhis') . $ext;
      if (move_uploaded_file($fileTmpName, $new_name_file)) {
        echo "<script>alert('Se subio correctamente el archivo');</script>";
      }else {
        echo "<script>alert('Ocurrio un error al subir el archivo'); window.history.go(-1);</script>";
      }
    }else {
      echo "<script>alert('Tipo de archivo no permitido, las extensiones permitidas son .pdf'); window.history.go(-1);</script>";
      // , .doc, .docx
    }
    $new_informe = "INSERT INTO informes_gestion (Id_inf, Tipo_Dato, Year, Titulo, Descripcion, Archivo) VALUES ('','Proyecto','$year','$title','$note','$new_name_file')";

    $agregar_inf = mysqli_query($connexion,$new_informe);

    if ($agregar_inf & $requerimientotable) {
      echo "<script>alert('Se han agregado los datos correctamente'); window.location='inf_list.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al agregar los datos'); window.history.go(-1);</script>";
    }
  } // Finalización del ingreso para los Proyectos
}




// Eliminación de los Informes y Proyectos
if (isset($_POST["delete-inf"])) {
  $codigo1 = $_POST["codigo"];
  $anio = $_POST["Year"];
  $tipo_dato = $_POST["type"];

  $delete_inf = "DELETE FROM informes_gestion WHERE Id_inf = $codigo1 AND Tipo_Dato = $tipo_dato";
  $delete_infT = "DELETE FROM informes_gestion_table WHERE Year = '$anio' AND Tipo_Dato_Tabla = $tipo_dato";

  $del_inf = mysqli_query($connexion,$delete_inf);
  $del_infT = mysqli_query($connexion,$delete_infT);

    $reset_Auto = "ALTER TABLE `informes_gestion_table` DROP Id_table";
      $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
    $reset_Auto2 = "ALTER TABLE `informes_gestion_table` AUTO_INCREMENT = 1";
      $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
    $reset_Auto3 ="ALTER TABLE `informes_gestion_table` ADD Id_table int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);

    $reset_Auto4 = "ALTER TABLE `informes_gestion` DROP Id_inf";
      $reset_autoincrement4 = mysqli_query($connexion,$reset_Auto4);
    $reset_Auto5 = "ALTER TABLE `informes_gestion` AUTO_INCREMENT = 1";
      $reset_autoincrement5 = mysqli_query($connexion,$reset_Auto5);
    $reset_Auto6 ="ALTER TABLE `informes_gestion` ADD Id_inf int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement6 = mysqli_query($connexion,$reset_Auto6);

  if ($del_inf & $del_infT) {
    echo "<script>alert('Se han eliminado los datos correspondientes'); window.location='inf_delete.php';</script>";
  }else {
    echo "<script>alert('Ocurrio un error al eliminar los datos'); window.history.go(-1);</script>";
  }
}




// Actualización de los Informes y Proyectos
if (isset($_POST["update_date"])) {
  $id = $_POST["Id_Informes"];
  $type = $_POST["type2"];
  $year = $_POST["inputYear2"];
  $title = $_POST["inputTitle"];
  $note = $_POST["FormControlNote"];
  $item = $_POST["Item"];
  $valor = $_POST["Valor"];

  echo ("<script>console.log('ID: ".$id."');</script>");
  echo ("<script>console.log('Tipo: ".$type."');</script>");
  echo ("<script>console.log('Año: ".$year."');</script>");
  echo ("<script>console.log('Titulo: ".$title."');</script>");
  echo ("<script>console.log('Nota: ".$note."');</script>");

  for ($i = 0; $i < count($item); $i++) {
    echo ("<script>console.log('Item-".$i.": ".$item[$i]."');</script>");
    echo ("<script>console.log('Valor-".$i.": ".$valor[$i]."');</script>");
  };

  // Actualización de datos para los informes de gestión 
  if ($type == "Informe_Gestion") {
    $delete_infT2 = "DELETE FROM informes_gestion_table WHERE Year = '$year' AND Tipo_Dato_Tabla = '$type'";
    $del_infT2 = mysqli_query($connexion,$delete_infT2);
    $reset_Auto = "ALTER TABLE `informes_gestion_table` DROP Id_table";
      $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
    $reset_Auto2 = "ALTER TABLE `informes_gestion_table` AUTO_INCREMENT = 1";
      $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
    $reset_Auto3 ="ALTER TABLE `informes_gestion_table` ADD Id_table int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($item); $i++) {
      $sql = "INSERT INTO informes_gestion_table (Id_table,Tipo_Dato_Tabla,Year,Item,Valor)
                VALUES('', 'Informe_Gestion', '$year', '".$item[$i]."', '".$valor[$i]."')";
      //Grabamos los datos en la tabla de la base de datos
      $requerimientotableG = mysqli_query($connexion,$sql);
    };

    // Inicio de la actualización en la Base de datos con la nueva información //
    $upnew_informeG = "UPDATE informes_gestion SET Id_inf='$id', Tipo_Dato='$type', Year='$year', Titulo='$title', 
                        Descripcion='$note' WHERE Id_inf = '$id'";
    $update_infG = mysqli_query($connexion,$upnew_informeG);
    // Fin de la actualización //

    if ($update_infG & $requerimientotableG) {
      echo "<script>alert('Se han actualizado los datos del informe de Gestión correctamente'); window.location='inf_update.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
    }
  }




  // Actualización de datos para los informes de gestión //
  if ($type == "Informe_Direccion-Ejecutiva") {
    $delete_infT2 = "DELETE FROM informes_gestion_table WHERE Year = '$year' AND Tipo_Dato_Tabla = '$type'";
    $del_infT2 = mysqli_query($connexion,$delete_infT2);
    $reset_Auto = "ALTER TABLE `informes_gestion_table` DROP Id_table";
      $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
    $reset_Auto2 = "ALTER TABLE `informes_gestion_table` AUTO_INCREMENT = 1";
      $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
    $reset_Auto3 ="ALTER TABLE `informes_gestion_table` ADD Id_table int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($item); $i++) {
      $sql = "INSERT INTO informes_gestion_table (Id_table,Tipo_Dato_Tabla,Year,Item,Valor)
                VALUES('', 'Informe_Direccion-Ejecutiva', '$year', '".$item[$i]."', '".$valor[$i]."')";
      //Grabamos los datos en la tabla de la base de datos
      $requerimientotableG = mysqli_query($connexion,$sql);
    };

    // Inicio de la actualización en la Base de datos con la nueva información //
    $upnew_informeG = "UPDATE informes_gestion SET Id_inf='$id', Tipo_Dato='$type', Year='$year', Titulo='$title', 
                        Descripcion='$note' WHERE Id_inf = '$id'";
    $update_infG = mysqli_query($connexion,$upnew_informeG);
    // Fin de la actualización //

    if ($update_infG & $requerimientotableG) {
      echo "<script>alert('Se han actualizado los datos del informe de Dirección Ejecutiva correctamente'); window.location='inf_update.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
    }
  }




  // Actualización de datos para los Proyectos //
  if ($type == "Proyecto") {
    $delete_infT2 = "DELETE FROM informes_gestion_table WHERE Year = '$year' AND Tipo_Dato_Tabla = '$type'";
    $del_infT2 = mysqli_query($connexion,$delete_infT2);
    $reset_Auto = "ALTER TABLE `informes_gestion_table` DROP Id_table";
      $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
    $reset_Auto2 = "ALTER TABLE `informes_gestion_table` AUTO_INCREMENT = 1";
      $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
    $reset_Auto3 ="ALTER TABLE `informes_gestion_table` ADD Id_table int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($item); $i++) {
      $sql = "INSERT INTO informes_gestion_table (Id_table,Tipo_Dato_Tabla,Year,Item,Valor)
                VALUES('', 'Proyecto', '$year', '".$item[$i]."', '".$valor[$i]."')";
      //Grabamos los datos en la tabla de la base de datos
      $requerimientotableP = mysqli_query($connexion,$sql);
    };

    // Inicio de la actualización en la Base de datos con la nueva información //
    $upnew_informeP = "UPDATE informes_gestion SET Id_inf='$id', Tipo_Dato='$type', Year='$year', Titulo='$title', 
                        Descripcion='$note' WHERE Id_inf = '$id'";
    $update_infP = mysqli_query($connexion,$upnew_informeP);
    // Fin de la actualización //

    if ($update_infP & $requerimientotableP) {
      echo "<script>alert('Se han actualizado los datos del proyecto correctamente'); window.location='inf_update.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al actualizar los datos'); window.history.go(-1);</script>";
    }
  }
}











/// Codigo para administrar todo lo relacionado con los botones de la página de noticias ///
if (isset($_POST["news_new"])) {
  $Titulo_News = $_POST["inputTitleNew"];
  $Descripcion_News = $_POST["FormControlNote"];

  // Funcionamiento para el guardado del archivo en el directorio 
  $formatos = array('.pdf');
  $filename = $_FILES['NewsFile']['name'];
  $fileTmpName = $_FILES['NewsFile']['tmp_name'];
  $ext = substr($filename, strrpos($filename, '.'));


  if (in_array($ext, $formatos)) {
    $dir = '../NEWs/';
    if(!file_exists($dir)){
      mkdir($dir, 0777, true);
    }
    $new_name_file = $dir .'NEWS-'. date('Ymdhi') . $ext;
    if (move_uploaded_file($fileTmpName, $new_name_file)) {
      echo "<script>alert('Se subio correctamente el archivo para la noticia');</script>";
    }else {
      echo "<script>alert('Ocurrio un error al subir el archivo'); window.history.go(-1);</script>";
    }
  }else {
  echo "<script>alert('Tipo de archivo no permitido, las extensiones permitidas son .pdf'); window.history.go(-1);</script>";
  }

  $tipoArchivo = $_FILES['inputImg']['type'];
  $nombreArchivo = $_FILES['inputImg']['name'];
  $tamanoArchivo = $_FILES['inputImg']['size'];
  $imagenSubida = fopen($_FILES['inputImg']['tmp_name'], 'r');
  $binariosImagen = fread($imagenSubida, $tamanoArchivo);
  include_once "db.php";
  $con = mysqli_connect($Host, $Username, $Password, $dbName);
  $binariosImagen = mysqli_escape_string($con, $binariosImagen);
  
  // $query = "INSERT INTO news (nombre,imagenes,tipo,creado) values 
  // ('" . $nombreArchivo . "','" . $binariosImagen . "','" . $tipoArchivo . "',now());";
  // $res = mysqli_query($con, $query);

  $new_news = "INSERT INTO news (Id_news, Titulo_News, Descripcion_News,Nombre_Img_News, Img_News, Tipo_News, Creado_News, Archivo_News) 
                          VALUES ('','$Titulo_News','$Descripcion_News','".$nombreArchivo."','".$binariosImagen."','".$tipoArchivo."',now(),'$new_name_file')";

  $agregar_news = mysqli_query($connexion,$new_news);

  if ($agregar_news) {
    echo "<script>alert('Se ha agregado la noticia correctamente'); window.location='new_noticias.php';</script>";
  }else {
    echo "<script>alert('Ocurrio un error al agregar los datos'); window.history.go(-1);</script>";
  }
}



// Eliminación noticias
if (isset($_POST["delete-news"])) {
  $Id = $_POST["ID_N"];
  $Title = $_POST["Title_N"];

  $delete_news = "DELETE FROM news WHERE Id_news = $Id AND Titulo_News = '$Title'";

  $del_new = mysqli_query($connexion,$delete_news);

    $reset_Auto4 = "ALTER TABLE `news` DROP Id_news";
      $reset_autoincrement4 = mysqli_query($connexion,$reset_Auto4);
    $reset_Auto5 = "ALTER TABLE `news` AUTO_INCREMENT = 1";
      $reset_autoincrement5 = mysqli_query($connexion,$reset_Auto5);
    $reset_Auto6 ="ALTER TABLE `news` ADD Id_news int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $reset_autoincrement6 = mysqli_query($connexion,$reset_Auto6);

  if ($del_new) {
    echo "<script>alert('Se ha eliminado la noticia'); window.location='del_noticias.php';</script>";
  }else {
    echo "<script>alert('Ocurrio un error al eliminar la noticia'); window.history.go(-1);</script>";
  }
}

// Modificación noticias
if (isset($_POST["mod_new"])) {
  $Id = $_POST["Id-New"];
  $Title = $_POST["inputTitleNew"];
  $Descipcion_News = $_POST['FormControlNote'];

  $upd_news = "UPDATE news SET Titulo_News = '$Title', Descripcion_News = '$Descipcion_News' WHERE Id_news = '$Id'";

  $update_new = mysqli_query($connexion,$upd_news);

  if ($update_new) {
    echo "<script>alert('Se ha actualizado la noticia'); window.location='mod_noticias.php';</script>";
  }else {
    echo "<script>alert('Ocurrio un error al actualizar la noticia'); window.history.go(-1);</script>";
  }
}


/// Codigo para administrar todo lo relacionado con los botones de la página de noticias ///
if (isset($_POST["asonorte"])) {
  // Funcionamiento para el guardado del archivo en el directorio 
  $formatos = array('.pdf');
  $filename = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $ext = substr($filename, strrpos($filename, '.'));

  if (in_array($ext, $formatos)) {
    $dir = '../BTNs/';
    if(!file_exists($dir)){
      mkdir($dir, 0777, true);
    }
    $new_name_file = $dir . 'ASONORTE-'. date('Ymdhi') . $ext;
    if (move_uploaded_file($fileTmpName, $new_name_file)) {
      $btn_asonorte = "INSERT INTO btns_noticias (Id_btns, Nombre_btn, Archivo_btn) VALUES ('','Archivo_Asonorte','$new_name_file')";
      $add_btn = mysqli_query($connexion,$btn_asonorte);
      echo "<script>alert('Se subio correctamente el archivo de Asonorte'); window.location='btns_noticias.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al subir el archivo'); window.history.go(-1);</script>";
    }
  }else {
    echo "<script>alert('Tipo de archivo no permitido, las extensiones permitidas son .pdf'); window.history.go(-1);</script>";
  }
}

if (isset($_POST["salvajina"])) {
  // Funcionamiento para el guardado del archivo en el directorio /BTNs
  $formatos = array('.pdf');
  $filename = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $ext = substr($filename, strrpos($filename, '.'));

  if (in_array($ext, $formatos)) {
    $dir = '../BTNs/';
    if(!file_exists($dir)){
      mkdir($dir, 0777, true);
    }
    $new_name_file = $dir . 'SALVAJINA-'. date('Ymdhi') . $ext;
    if (move_uploaded_file($fileTmpName, $new_name_file)) {
      $btn_salvajina = "INSERT INTO btns_noticias (Id_btns, Nombre_btn, Archivo_btn) VALUES ('','Archivo_Salvajina','$new_name_file')";
      $add_btn = mysqli_query($connexion,$btn_salvajina);
      echo "<script>alert('Se subio correctamente el archivo de Salvajina'); window.location='btns_noticias.php';</script>";
    }else {
      echo "<script>alert('Ocurrio un error al subir el archivo'); window.history.go(-1);</script>";
    }
  }else {
    echo "<script>alert('Tipo de archivo no permitido, las extensiones permitidas son .pdf'); window.history.go(-1);</script>";
  }
}

// Inicio de la eliminacion de los botones
if (isset($_POST["eliminar_btn"])) {
  $type_btn = $_POST["btn-elim"];

  // Eliminacion del boton de salvajina //
  if ($type_btn == "btn_salvajina") {
    echo ("<script>console.log('Hello world, I am a button for delete Salvajina');</script>");

    $sql = "DELETE FROM btns_noticias WHERE Nombre_btn = 'Archivo_Salvajina'";

    $exc = mysqli_query($connexion, $sql);

    $reset_Auto = "ALTER TABLE `btns_noticias` DROP id_btns";
        $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
      $reset_Auto2 = "ALTER TABLE `btns_noticias` AUTO_INCREMENT = 1";
        $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
      $reset_Auto3 ="ALTER TABLE `btns_noticias` ADD id_btns int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
        $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);

    if ($exc) {
      echo "<script>alert('Boton de Salvajina eliminado con exito'); window.location='btns_noticias.php';</script>";
    }else {
        echo "<script>alert('Ocurrio un error al eliminar el boton de salvajina - Error <?php echo mysqli_error($con); ?>'); window.history.go(-1);</script>";
    }
  }

  // Eliminación del boton de asonorte //
  if ($type_btn == "btn_asonorte") {
    echo ("<script>console.log('Hello world, I am a button for delete Asonorte');</script>");

    $sql = "DELETE FROM btns_noticias WHERE Nombre_btn = 'Archivo_Asonorte'";

    $exc = mysqli_query($connexion, $sql);

    $reset_Auto = "ALTER TABLE `btns_noticias` DROP id_btns";
        $reset_autoincrement = mysqli_query($connexion,$reset_Auto);
      $reset_Auto2 = "ALTER TABLE `btns_noticias` AUTO_INCREMENT = 1";
        $reset_autoincrement2 = mysqli_query($connexion,$reset_Auto2);
      $reset_Auto3 ="ALTER TABLE `btns_noticias` ADD id_btns int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
        $reset_autoincrement3 = mysqli_query($connexion,$reset_Auto3);

    if ($exc) {
      echo "<script>alert('Boton de Asonorte eliminado con exito'); window.location='btns_noticias.php';</script>";
    }else {
        echo "<script>alert('Ocurrio un error al eliminar el boton de asonorte - Error <?php echo mysqli_error($con); ?>'); window.history.go(-1);</script>";
    }
  }
} // ..// Fin del Codigo para administrar todo lo relacionado con los botones de la página de noticias
*/
?>
