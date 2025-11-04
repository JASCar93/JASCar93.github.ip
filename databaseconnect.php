<?php
    require_once 'pdoconfig.php';
     
$servername = "localhost";
$sql = "mysql:host=$servername;dbname=$dbname;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
} catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}

$nombre = $_POST['Nombre'];
$telefono = $_POST['Telefono'];
$correo = $_POST['Correo'];
$tema = $_POST['Tema'];
$mensaje = $_POST['Mensaje'];


$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO datos (nombre, telefono, correo, tema, mensaje) VALUES (:nombre, :telefono, :correo, :tema, :mensaje)");

$my_Insert_Statement->bindParam(":nombre", $nombre);
$my_Insert_Statement->bindParam(":telefono", $telefono);
$my_Insert_Statement->bindParam(":correo", $correo);
$my_Insert_Statement->bindParam(":tema", $tema);
$my_Insert_Statement->bindParam(":mensaje", $mensaje);

if ($my_Insert_Statement->execute()) {
} else {
  echo "Unable to create record";
}
	echo'
		<script>
			alert("Registro Exitoso");
			location.href="index.html";
		</script>
	'
?>