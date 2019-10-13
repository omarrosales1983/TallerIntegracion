<?php 

exec('respaldo.bat');

			$host="localhost"; //dirección donde se encuentra alojada nuestra pagina
			$usuario="root";//nombre de usuario de la base de datos
			$contraseña="";//contraseña de la base de datos
			$basededatos="agenda";//nombre de la base de datos

			$conectar=mysqli_connect($host,$usuario,$contraseña,$basededatos) or die ("problemas al conectar con el servidor");

$bitacora="insert into bitacora (usuario,fecha,accion) values ('admin',NOW(),'copia seguridad')";
mysqli_query($conectar,$bitacora);
mysqli_close($conectar);

header ('location:proyecto.php');
?>