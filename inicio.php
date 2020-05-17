<?php
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$user = "sergio";
$password = "saos43376";
$database = "login";
$table = "registro";
try {
$db = new mysqli("localhost", $user, $password, $database);
// $sql = "INSERT INTO $table (correo, contrasena) VALUES
// (\"$correo\", \"$contrasena\")";
$sql = "SELECT contrasena FROM $table WHERE correo='$correo'";
if ($resultado = $db->query($sql)) {
  $contra = $resultado->fetch_row()[0];
  if (!strcasecmp($contra, $contrasena)) {
    echo "Bienvenido/a";
  } else {
    echo "ERROR EN LA AUTENTICACION";
  }
}
// echo '<!DOCTYPE html>
// <html lang="en">
// <head>
//   <meta charset="UTF-8">
//   <meta name="viewport" content="width=device-width, initial-scale=1.0">
//   <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
//   <link rel="stylesheet" href="inicio.css">
//   <title>Registro</title>
// </head>
// <body>
//   <div class="contenedor">
//     <div class="botones form">
//       <h1>Registro Exitoso</h1>
//       <a href="index.html">Regresar</a>
//       <a href="inicio.html">Iniciar Sesi&oacute;n</a>
//     </div>
//   </div>
// </body>
// </html>';
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}